<?php
/**
 * Created by PhpStorm.
 * User: EDIRIN PC
 * Date: 8/31/2021
 * Time: 1:01 AM
 */

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Usersignup;
use App\Models\General_model;

class Signup extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'session']);
        model('General_model');
        $this->session = \Config\Services::session();
    }
    public function index()
    { $model = new General_model();
        $page_data['roles'] = $model->roles("1");
        $page_data['title'] = "Sign up";
        //return view('welcome_message');
        //echo view('general/header3');
        //echo view('backend/Signup',$page_data);
        //echo view('general/scripts');
        //echo view('general/footer3');
        //$this->load->view('frontend/index-script');
        //echo view('general/end_tags');
        $this->load_pages('Signup',$page_data,'rec_scr',0);
    }
    public function create()
    {

        // validate inputs
        $inputs = $this->validate([
            'fname' => [
                'label' => 'Fname',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Please enter your First name.',
                    'min_length' => 'First name must be atleast 3 characters long.'
                ]
            ],
            'lname' => [
                'label' => 'Lname',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Please enter your Last name.',
                    'min_length' => 'Last name must be atleast 3 characters long.'
                ]
            ],
            'uname' => [
                'label' => 'Uname',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Please enter your Username.',
                    'min_length' => 'Username must be atleast 6 characters long.'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Enter your email.',
                    'valid_email' => 'Please enter a valid email address.'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]|alpha_numeric',
                'errors' => [
                    'required' => 'Enter your password.',
                    'min_length' => 'Password must be atleast 5 digits.',
                    'alpha_numeric' => 'Password must contain alpha numeric'
                ]
            ],
            'confirm_password' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Re-enter your password.',
                    'matches' => 'Confirm password and password must be same.'
                ],
            ],
            'txtrole' => [
                'label' => 'txtrole',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Account Type is Required.'
                ],
            ],
            'phone' => [
                'label' => 'Mobile number',
                'rules' => 'required|numeric|regex_match[/^[0-9]{11}$/]',
                'errors' => [
                    'required' => 'Enter your mobile number.',
                    'numeric' => 'Mobile number must be a number.',
                    'regex_match' => 'Mobile number must be a valid 11 digit mobile number.'
                ]
            ],

        ]);

        if (!$inputs) {
            //echo view('general/header3');
            //echo view('backend/Signup', ['validation' => $this->validator]);
            //echo view('general/scripts');
            //echo view('general/footer3');
            $model = new General_model();
            $page_data['roles'] = $model->roles();
            $page_data['validation'] = $this->validator;
            $this->load_pages('Signup',$page_data,null,0);
        } else {
            //generate simple random code
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = substr(str_shuffle($set), 0, 12);
$userdata = array(
    'fname' => $this->request->getVar('fname'),
    'username' => $this->request->getVar('uname'),
    'email' => $this->request->getVar('email'),
    'passn' => $this->request->getVar('password'),
    'lname' => $this->request->getVar('lname'),
    'pass' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
    'trackno' => $code ,
    'phone' => $this->request->getVar('phone'),
    'role'  => $this->request->getVar('txtrole')
);

            // insert data
            $user = new Usersignup;
            $email =  $user->where(array('email' => $this->request->getVar('email')));
            $rows = $user->countAllResults();
            $uname1 =  $user->where(array('username' => $this->request->getVar('uname')));
            $rows2 = $user->countAllResults();
            $db = \Config\Database::connect();
            $qdetails = $db->table('details');

            if($rows !=0) {
                session()->setFlashdata('failed', 'Email Already Registerd.');
                return redirect()->to(site_url('/usersignup'));
            }elseif($rows2 !=0){
                session()->setFlashdata('failed', 'Username '.$userdata['username'].' Already Exist.');
                return redirect()->to(site_url('/usersignup'));
            }else{

           if($id = $user->save($userdata)){
               $insertid = $user->insertID();
               $userd = array(
                   'uid' => $insertid
               );
               $qdetails->insert($userd);
               $message = "<html>
						<head>
							<title>User Verification Email</title>
						</head>
						<body>
							<h2>Thank you for Signing up with Rent Flexy.</h2>
							<p>Your Account:</p>
							<p>Username: " . $userdata['username'] . "</p>
							<p>Password: " . $userdata['passn'] . "</p>
							<p>Please click the link below to activate your account.</p>
							<h4><a href='" . base_url() . "signup/activate/" . $insertid . "/" . $code . "'>Activate My Account</a></h4>
						</body>
						</html>";
               $smail = "akubesttech@gmail.com";
               $this->sendMaild($message, $smail, $userdata['email'], 'Rent Flexy', 'Signup Verification Email');
               //session()->setFlashdata('msg', '.$user.');
               $this->session->set('msg', $userdata);
               return redirect()->to('/signup/verify');
           }else{
               session()->setFlashdata('failed', 'Unable to Complete the Signup please try Again.');
               return redirect()->to(site_url('/usersignup'));
           }
            }}
    }
    public function verify()
    { $val =  session()->get('msg');
        $page_data = array();
        $page_data['msg'] = $val ;
        $page_data['title'] = "Email Verification" ;
        $user = new Usersignup;
        if(empty($val)){
            return redirect()->to('/Signup');
        }else{
            $this->load_pages('verify',$page_data,null);
        }
    }

    private function load_pages($page_name, $data = null,$p_script = null, $htype = 0)
    {
        if(!empty($htype)){
            echo view('general/header2');
            echo view('general/navbar');
            echo view('general/admin_sidebar');
        }else{
            echo view('general/header3',$data);
        }
        if($data != null){
            echo view('backend/'.$page_name,$data);
        }else{
            echo view('backend/'.$page_name);
        }
        if(!empty($htype)){
            echo view('general/footer2');
        }else{
            echo view('general/footer3');
        }

        //echo view('general/scripts');
        if ($p_script != null){
            echo view('backend/'.$p_script);
        }
        echo view('general/end_tags');
    }
    public function sendMaild($msg,$semail,$remail,$mtitle,$msub){
        //$message = "Please activate the account ".anchor('user/activate/'.$data['u_link'],'Activate Now','');
        $email = \Config\Services::email();
        $email->setFrom($semail, $mtitle);
        $email->setTo($remail);
        $email->setSubject($msub);
        $email->setMessage($msg);//your message here

        //$email->setCC('another@emailHere');//CC
        //$email->setBCC('thirdEmail@emialHere');// and BCC
        //$filename = '/img/yourPhoto.jpg'; //you can use the App patch
        //$email->attach($filename);

        $email->send();
        $email->printDebugger(['headers']);
    }
    public function activate($id,$code){
    //fetch user details
        $user = new Usersignup;
        //$user = $this->users_model->getUser($id);
        $user2 = $user->find($id);
        //if code matches
        if($user2['trackno'] == $code){
            //update user active status
            $user2['active'] = true;
            //$query = $this->users_model->activate($data, $id);
            $query = $user->update($id, $user2);
            if($query){ session()->setFlashdata('success', 'User activated successfully,Click Login to Signin to your account');
            } else{
               session()->setFlashdata('failed', 'Something went wrong in activating account');}
        } else{ session()->setFlashdata('failed', 'Cannot activate account. Because email verification failed please try again');
        }

        //redirect('register');
        return redirect()->to('/Signup');
    }
    public function Resend()
    { $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($set), 0, 12);
        $userdata = array(
        'username' => $this->request->getVar('uname'),
        'email' => $this->request->getVar('email'),
        'code' => $code,
        'pass' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
    );

        $user = new Usersignup;
        $user2 =  $user->where(array('username' => $this->request->getVar('uname')));
        $user3 = $user->first();
        $id2 = $user3['id'];
        $user1 = $user->find($id2);
        $user1['trackno'] = $code;
        $id = $user->update($id2, $user1);
        $message = "<html>
						<head>
							<title>User Verification Email</title>
						</head>
						<body>
							<h2>Thank you for Signing up with Rent Flexy.</h2>
							<p>Your Account:</p>
							<p>Username: ".$userdata['username']."</p>
							<p>Password: ".$this->request->getVar('password')."</p>
							<p>Please click the link below to activate your account.</p>
							<h4><a href='".base_url()."signup/activate/".$id2."/".$code."'>Activate My Account</a></h4>
						</body>
						</html>";
        $smail = "akubesttech@gmail.com";
       if($this->sendMaild($message,$smail,$userdata['email'],'Rent Flexy','Signup Verification Email')){
        session()->setFlashdata('success', 'Verification Email Successfuly Resend To '.$userdata['email']);}else{
           session()->setFlashdata('failed', 'Verification Email Not Successfuly Resend To '.$userdata['email']);
       }
        return redirect()->to('/signup/verify');
    }

    public function getroleRemark($id = null)
    { $db = \Config\Database::connect();
        $remarks = $db->table('roles')->where('id',$id)->get()->getResult();
        echo json_encode($remarks);
    }
}