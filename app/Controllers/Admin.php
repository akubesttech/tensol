<?php
/**
 * Created by PhpStorm.
 * User: EDIRIN PC
 * Date: 8/3/2021
 * Time: 9:53 PM
 */

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use App\Models\General_model;
use App\Models\Usersignup;

class Admin extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'session','app']);
        model('General_model');
        $this->session = \Config\Services::session();
    }

    public function index($info = null)
    { $data = [];
        $data['title'] = 'Admin';
        if ($info != null) {
            $this->load_pages('login', $info, null, null);
        } else {
            if (isset($_SESSION['info'])) {
                $user = $_SESSION['info'];
                if ($user['role'] == 3) {
                   return redirect()->to('admin/s_dashboard');
                } else { //redirect('admin/dashboard');
                    return redirect()->to('admin/dashboard');
                }
            }
            $data['title'] = "Login";
            $this->load_pages('login', $data, null, null);
        }
    }
    public function verify_admin(){
        // validate inputs
        $data = [];
        $data['title'] = "Login";
        $inputs = $this->validate([
            'userid' => [
                'label' => 'Uname',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Please enter your Username/Email.'
                ]
            ],
            'pword' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]|alpha_numeric',
                'errors' => [
                    'required' => 'Enter your password.',
                    'min_length' => 'Password must be atleast 6 digits.',
                    'alpha_numeric' => 'Password must contain alpha numeric and not lessthan six characters'
                ]
            ],
        ]);
        $data['validation'] = $this->validator;
        if (!$inputs) {
      $this->load_pages('login', $data, null, null);
        }else{
            $model = new General_model();
            $user = $this->request->getVar('userid');
            $password = $this->request->getVar('pword');
            $user_info = $model->where('username' , $this->request->getVar('userid'))
                ->orWhere('email' , $this->request->getVar('userid'))
                ->first();
            $veri = $model->where('username' , $this->request->getVar('userid'))
                ->where('active' , "1")
                ->orWhere('email' , $this->request->getVar('userid'))
                ->where('active' , "1")
                ->first();
            if($user_info){
                $pass = $user_info['pass'];
               $roln = $model->getRolename($user_info['role']);
               $verify_pass = password_verify($password, $pass);
                if($verify_pass) {
if($veri) {
    $ses_data = [
        'user_id' => $user_info['id'],
        'lname' => $user_info['lname'],
        'fname' => $user_info['fname'],
        'uname' => $user_info['username'],
        'uemail' => $user_info['email'],
        'role' => $user_info['role'],
        'rolename' => $roln,
        'pic' => $user_info['pic'],
        'active' => TRUE
    ];
    $time = new Time('NOW');
    $c_time = $time->format('Y-m-d H:i:s');
    $logdata = [
        'admin_id' => $user_info['id'],
        'username' => $user_info['username'],
        'ip' => getClientIpAddress(),
        'login_date' => $c_time
    ];
    $model->insert_logs($logdata);
    $this->session->set('info', $ses_data);
    if ($user_info['role'] == 3) {
        return redirect()->to('admin/s_dashboard');
    }
    return redirect()->to('admin/dashboard');
}else{
    session()->setFlashdata('failed', 'Please Check your Email <b>'.$user_info['email'].'</b> for verification Link');
    return redirect()->to(site_url('/admin'));
}
                }else{
                    session()->setFlashdata('failed', 'Wrong User Password!.');
                    return redirect()->to(site_url('/admin'));
                }
            }else{
                session()->setFlashdata('failed', 'Wrong Username/Email!');
                return redirect()->to(site_url('/admin'));
            }

    }}

    public function s_dashboard(){
        if(isset($_SESSION['info'])){
            $info = $_SESSION['info'];

            $page_data = array();
            $page_data['services'] = $this->general_model->get_service_details();
            $page_data['subservices'] = $this->general_model->get_subservices();
            $page_data['lgas'] = $this->general_model->load_lgas();
            $page_data['info'] = $info;
            $page_data['b_cats'] = $this->general_model->load_bus_categories();
            $page_data['b_types'] = $this->general_model->fetch_business_types();
            $page_data['p_cats'] = $this->general_model->get_prop_category();
            $page_data['p_types'] = $this->general_model->fetch_property_types();
            $page_data['b_fees'] = $this->general_model->fetch_busi_fees();
            $page_data['p_fees'] =$this->general_model->fetch_prop_fees();
            $page_data['lg_subs'] = $this->general_model->lg_subs();
            $page_data['handlers'] = $this->general_model->get_handlers(0);
            $page_data['roles'] = $this->general_model->fetch_roles();
            $this->load_pages('dashboard',$page_data,'dashb_script');
        }else{
            redirect('admin');
        }
    }
    public function dashboard(){
        $info = array();
        $val =  session()->get('info');
        //$page_data['msg'] = $val ;

        if(isset($val)){
            $info = $val;
        }else{
            return redirect()->to('admin');
        }
        $model = new General_model();
        //$page_data['lg_services'] = $services;
        $page_data['info'] = $info;
        $page_data['b_cats'] = $model->load_bus_categories();
        $page_data['p_type'] = $model->load_pro_type();
        $page_data['p_feat'] = $model->load_p_feat();
        $page_data['lcompy'] = $model->load_compy();
        $page_data['roles'] = $model->roles();
        $page_data['stat'] = $model->getstatus();
        $page_data['lstate'] = $model->getstate();
        $page_data['powner'] = $model->loaduser('3');
        $page_data['plord'] = $model->loaduser('4');
        $page_data['pcat'] = $model->load_bus_categories();
        $page_data['pref'] = $model->generate_reference();
        $page_data['udetails'] = $model->load_user_details($info['user_id']);
        $this->load_pages('dashboard',$page_data,'dashb_script',1);
    }
    public function lfeature(){
        $model = new General_model();
        $data= $model->load_p_feat();
            echo json_encode($data);
        }
    public function loadusers($urole){
        $model = new General_model();
        $data= $model->loaduser($urole);
        echo json_encode($data);
    }
    public function loadpro($id='',$pwd=''){
        $user = $_SESSION['info'];
       $urole =  $user['role'];
        $model = new General_model();
        $data= $model->loadpro($id,$pwd,$urole);
        echo json_encode($data);
    }
    public function loadten($id='',$pwd=''){
        $user = $_SESSION['info'];
        $urole =  $user['role'];
        $model = new General_model();
        $data= $model->loadten($id,$pwd,$urole);
        echo json_encode($data);
    }
    public function lalog(){
        $model = new General_model();
        $data= $model->alog();
        echo json_encode($data);
    }
    public function lulog(){
        $model = new General_model();
        $data= $model->ulog();
        echo json_encode($data);
    }
    public function delete_aall()
    { $model = new General_model();
        if($this->request->getVar('cbox_value'))
        { $id = $this->request->getVar('cbox_value');
            for($count = 0; $count < count($id); $count++)
            { $model->delalog($id[$count]);
            }}}
    public function delete_uall()
    { $model = new General_model();
        if($this->request->getVar('ubox_value'))
        { $id = $this->request->getVar('ubox_value');
            for($count = 0; $count < count($id); $count++)
            { $model->delulog($id[$count]);
            }}}
    public function logout(){
        $user = $_SESSION['info'];
        $model = new General_model();
        $time = new Time('NOW');
        $c_time = $time->format('Y-m-d H:i:s');
        $data = array('logout_date' => $c_time);
        $model->update_logs($data,$user['user_id']);
        session_destroy();
        return redirect()->to('admin');
    }
    //fetch Tennant verification details
    public function ften_d($id = null)
    {    $user = $_SESSION['info'];
        $urole =  $user['role'];
        $db = \Config\Database::connect();
        $builder = $db->table('tenant_tb as otb');
        $builder2 = $db->table('verification_tb as vtb');
        $builder->select("otb.*, atb.fname,atb.lname,atb.oname,ptb.pro_ref,ptb.pro_location,ptb.cperiod,ptb.amt_min,atb.pic,ttb.ptype,dtb.gender,dtb.address,atb.email,atb.phone");
        $builder->join('admin as atb', 'otb.tenant_id = atb.id', "left"); // added left here
        $builder->join('details as dtb', 'otb.tenant_id = dtb.uid', "left"); // added left here
        $builder->join('property_tb as ptb', 'otb.pro_no = ptb.id', "left"); // added left here
        $builder->join('property_type as ttb', 'ptb.pro_type = ttb.id', "left"); // added left here
        $data = $builder->where('otb.record_id', $id)->get()->getResult();
        $data2 = $builder2->where('vtb.applicant_id', $id)->get()->getResult();
        if($data){
            echo json_encode(array("status" => true , 'data' => $data,'data2' => $data2));
        }else{
            echo json_encode(array("status" => false));
        }
    }
    public function forgot_pss(){
        if($this->request->isAJAX()){
            echo json_encode(['error'=>"Invalid access",'csrf' => csrf_hash()]);
            //exit();
        }
      /*  $user = new General_model();
        $pdata = $this->request->getVar(null,false);
        $resp = $user->processForgotPassword($pdata['sm_id'],$pdata['email']);
        if(is_string($resp)){
            $ret = ['error'=>$resp];
        }else{
            $ret = ['message'=>"Your password recovery verification code has been sent to your email, expires in 4 minutes!!"];
        }
        echo json_encode($ret);
        exit();*/
    }
    public function changepassword(){
        //if($this->input->isAJAX()){
            //echo json_encode(['error'=>"Invalid access"]);
            //exit();
       // }
        //$pdata = $this->input->post(null,false);
        $pdata = array(
            'ad_id' => $this->request->getVar('ad_id'),
            'cpword' => $this->request->getVar('cpass'),
            'pword' => $this->request->getVar('pword'),
            'conpword' => $this->request->getVar('conpword')
        );

        if($pdata['pword'] !== $pdata['conpword']){
            $message = "New and Confirm password fields must contain same values!";
        }else{ $model = new General_model();
            $message = $model->changePassword($pdata['pword'],$pdata['cpword'],$pdata['ad_id']);
        }
        echo json_encode(['message'=>$message]);
        exit();
    }
    public function forgot_pass(){
        $data = [];
        $data['title'] = "Forget Password";
        if($this->request->getMethod()=='post'){
        $inputs = $this->validate([
            'email' => [
                'label' => 'email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Field Required.',
                    'valid_email'=>'valid Email Required'
                ]
            ],

        ]);
        if ($inputs) { $model = new General_model();
        $email = $this->request->getVar('email',FILTER_SANITIZE_EMAIL);
        $userdata = $model->verifyEmail($email);
        if(!empty($userdata)){
            //generate simple random code
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $token = substr(str_shuffle($set), 0, 12);
            $time = new Time('now');
            $c_time = $time->format('Y-m-d H:s');
            //$addt = $time->setMinute(15);
            //(new DateTime())->modify('+15 minutes')->format("Y-m-d H:i:s");
            //$e_time = $time->format('Y-m-d H:s+54000');
            $e_time = $time->modify('+15 minutes')->format('Y-m-d H:i:s');
            $recdata = [
                'admin_id' => $userdata['id'],
                'recovery_code'  => $token,
                'request_time'  => $c_time,
                'expiry_time'  => $e_time,
                'user_id'  => $email,
            ];
            $id = $model->processForgotPassword($recdata);
            $message = "<html>
						<head>
							<title>User Password Recovery Email</title>
						</head>
						<body>
							<h2>Hello! ".$userdata['fname']." ".$userdata['lname']." .</h2>
							<p>Your reset password request has been received. please click:</p>
							<p>Please click the link below to reset your password.</p>
							<p></p>
							<h4><a href='".base_url()."admin/resetPassword/".$recdata['admin_id']."/".$token."'>Click Here to reset Password </a></h4>
							<p>if your not the person that initiated this request please ignore</p>
							<p>Thank Your Rent Flexy Team</p>
						</body>
						</html>";
            $smail = "akubesttech@gmail.com";
            if($this->sendMaild($message,$smail,$userdata['email'],'Rent Flexy','Password Reset Link')){
                session()->setFlashdata('success', 'Reset Password Link sent to your registered email '.$userdata['email'].' Please verify with in 15mins');}else{
                session()->setFlashdata('failed', 'Reset Password Link Not Successfuly sent To '.$userdata['email'].', Please try again');
            }
            return redirect()->to(current_url());
        }else{
            session()->setFlashdata('failed', 'Email does not Exist!');
            return redirect()->to(current_url());
        }
        }else{
         $data['validation'] = $this->validator;
        }}
        $this->load_pages('recover_pass',$data,'rec_scr');
    }

    public function resetPassword($id = null,$token = null)
    {  $data = [];
        $data['title'] = ' Password Reset';
if(!empty($token)){
    $model = new General_model();
    $userdata = $model->verifyToken($token);
if(!empty($userdata)){
    if($this->checkExpireDate($userdata['expiry_time'])) {
        if($this->request->getMethod()=='post') {
            $inputs = $this->validate([
                'pword' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[6]|max_length[16]',
                    'errors' => [
                        'required' => 'Field Required.',
                        'min_length' => 'Password must be atleast 5 digits.'
                    ]
                ],
                'pword2' => [
                    'label' => 'Comfirm Password',
                    'rules' => 'required|matches[pword]',
                    'errors' => [
                        'required' => 'Field Required.',
                        'matches' => 'Confirm password and password must be same.'
                    ]
                ],

            ]);
            if ($inputs) {
                $pwd = password_hash($this->request->getVar('pword'), PASSWORD_DEFAULT);
                if($model->updatePassword($token,$pwd,$id)){
                    session()->setFlashdata('success', 'Password updated Successfully, Login Now');
                    return redirect()->to(BASEURL."admin");
                }else{
                    session()->setFlashdata('failed', 'Sorry!,unable to update password, Try again');
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }

    }else{
        //session()->setFlashdata('failed', 'Reset Password Link was Expired!');
        //return redirect()->to(current_url());
        $data['error'] = "Reset Password Link was Expired!";
    }

    }else{
   // session()->setFlashdata('failed', 'Unable to find user account!');
   // return redirect()->to(current_url());
        $data['error'] = "Unable to find user account";
    }
}else{
    //session()->setFlashdata('failed', 'unauthourized Access!');
    //return redirect()->to(current_url());
    $data['error'] = "Sorry!, unauthourized Access!";
}
$this->load_pages('reset_pass',$data,'rec_scr');
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
    public function checkExpireDate($ntime){
        $time = new Time('now');
        $updatet = strtotime($ntime);
        $c_time = strtotime($time->format('Y-m-d H:s'));
        $timediff = ($c_time - $updatet)/60;
        if($timediff < 900){ return true;}else{return false;}
    }
    private function load_pages($page_name, $data = null,$p_script = null, $htype = 0)
    { if(!empty($htype)){
        echo view('general/header2');
            echo view('general/navbar',$data);
            echo view('general/admin_sidebar',$data);
    }else{ echo view('general/header3',$data);}
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
        if($p_script != null){
            echo view('backend/'.$p_script);
        }
        echo view('general/end_tags');
    }

    public function add_bus_cat(){
        helper(['form']);
        if(isset($_SESSION['info'])){

        }else{
            $ret_array['error'] = "You are not authorized";
        }
       $catn = $this->request->getVar('catn');
        $ret_array = array();
        $model = new General_model();
        $resp = $model->add_business_category($catn);
        if(is_string($resp)){
            $ret_array['error'] = $resp;
        }else{
            $ret_array['message'] = "Category Successfully Added";
            $ret_array['cats'] = $resp;
        }
        echo json_encode($ret_array);
    }
    public function add_pro_cat(){
        helper(['form']);
        if(isset($_SESSION['info'])){

        }else{
            $ret_array['error'] = "You are not authorized";
        }
        $catn = $this->request->getVar('cat_name');
        $ptype = $this->request->getVar('ptype');
        $ret_array = array();
        $model = new General_model();
        $resp = $model->add_pro_type($catn,$ptype);
        if(is_string($resp)){
            $ret_array['error'] = $resp;
        }else{
            $ret_array['message'] = "Property Type Successfully Added";
            $ret_array['cats'] = $resp;
        }
        echo json_encode($ret_array);
    }

    public function getlga($id = null)
    { $db = \Config\Database::connect();
        $cities = $db->table('lga_tb')->where('state',$id)->get()->getResult();
        echo json_encode($cities);
    }

    public function deleten(){
        $msg = '';
        $status = 0;

        $id = $this->request->getVar('id');

        // Check whether member id is not empty
        if(!empty($id)){
            // Delete member
            $model = new General_model();
            $delete = $model->deleten($id);

            if($delete){
                $status = 1;
                $msg .= 'Member has been removed successfully.';
            }else{
                $msg .= 'Some problem occurred, please try again.';
            }
        }else{
            $msg .= 'Some problem occurred, please try again.';
        }

        // Return response as JSON format
        $alertType = ($status == 1)?'alert-success':'alert-danger';
        $statusMsg = '<p class="alert '.$alertType.'">'.$msg.'</p>';
        $response = array(
            'status' => $status,
            'msg' => $statusMsg
        );
        echo json_encode($response);
    }
    function savefeat(){ $farray = array();
        $feature_name = $this->request->getVar('pfeat');
        $model = new General_model();
        $data = $model->save_lfeat($feature_name);
        if(is_string($data)){
            $farray['error'] = $data;
        }else{
       $farray['data'] = $data;
            $farray['message'] = "Property Feature successfully Added !";
        }
        echo json_encode($farray);
       // echo json_encode($data);
    }
    function delfeat(){
        $id = $this->request->getVar('fid');
        $model = new General_model();
        $data = $model->delfeat($id);
        echo json_encode($data);
    }
    function update_feature(){ $farray = array();
        $id = $this->request->getVar('fid');
        $feature_name = $this->request->getVar('feature_name');
        $model = new General_model();
        $data = $model->update_feat($feature_name,$id);
        if(is_string($data)){
            $farray['error'] = $data;
        }else{
            $farray['data'] = $data;
            $farray['message'] = "Property Feature successfully Updated !";
        }
        echo json_encode($farray);
    }

    public function add_compy()
    {
        helper(['form', 'url']);
        $model = new General_model();
         $data = array(
             'uid'  => $this->request->getVar('txtuid'),
            'compy_n' => $this->request->getVar('txtCpname'),
            'email'  => $this->request->getVar('txtCpemail'),
            'phone'  => $this->request->getVar('txtCpphone'),
            'compy_desc'  => $this->request->getVar('txtCpdes'),
            'compy_add'  => $this->request->getVar('txtCpcnt'),
              'state'  => $this->request->getVar('state1'),
            'clga'  => $this->request->getVar('lga1')
         );
        $return_array = array();
        $save = $model->insert_compy($data);
        if(is_string($save)){
          // echo json_encode(array("status" => false , 'data' => $save));
            $return_array['error'] = $save;
        }else{
            $return_array['msg'] = "Company/Organization Information Successfully Added";
            $return_array['recd'] = $save;
        }
        echo json_encode($return_array);

    }
    public function edit_compy()
    { helper(['form', 'url']);
        $model = new General_model();
        $id = $this->request->getVar('txtcid');
        $data = array(
           'uid'  => $this->request->getVar('txtuid'),
            'compy_n' => $this->request->getVar('txtCpname'),
            'email'  => $this->request->getVar('txtCpemail'),
            'phone'  => $this->request->getVar('txtCpphone'),
            'compy_desc'  => $this->request->getVar('txtCpdes'),
            'compy_add'  => $this->request->getVar('txtCpcnt'),
            'state'  => $this->request->getVar('state2'),
            'clga'  => $this->request->getVar('lga2')
        );
        $return_array = array();
        $save = $model->update_compy($data,$id);
        if(is_string($save)){
          $return_array['error'] = $save;
        }else{
            $return_array['msg'] = "Company/Organization Information Successfully Updated !!!";
            $return_array['recd'] = $save;
        }
        echo json_encode($return_array);
    }
    public function delcompy($id = null){
        $db = \Config\Database::connect();
        $model = $db->table('compy_tb');
        $delete = $model->where('id', $id)->delete();
        if($delete)
        {echo json_encode(array("status" => true));
        }else{
            echo json_encode(array("status" => false));
        }
    }

    public function ecomp($id = null)
    {   $db = \Config\Database::connect();
        $builder = $db->table('compy_tb as ctb');
        $builder->select("ctb.*, ctb.state as state,ltb.lga");
        $builder->join('lga_tb as ltb', 'ctb.clga = ltb.lga_id', "left"); // added left here
       $data = $builder->where('ctb.id', $id)->get()->getResult();
        if($data){
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false));
        }
    }

    public function upprofile(){
       helper(['form', 'url']);
        $origin = array();
        $file = $this->request->getFile('photo_id');
        $uimg = $this->request->getVar('oimg');
        $id = $this->request->getVar('uid');
        $p_img = $file->getName();
        // Renaming file before upload
        $temp = explode(".",$p_img);
        if(empty($p_img)){ $profile_img = $uimg;}else{
        $profile_img = round(microtime(true)) . '.' . end($temp);}
        //$r = 0;$dig = 0;
        //while($r < 6){ $dig .=rand(3,9);
           // $r+=1;}
        if(!empty($p_img)){
        // Image manipulation
        //try {
       $image = \Config\Services::image()
            ->withFile($file)
            ->fit(150, 150, 'left')
           // ->rotate(90)
           ->save(FCPATH .'/assets/img/users/'. $profile_img);
       // } catch (CodeIgniter\Images\ImageException $e) {
            //echo $e->getMessage();
        //}

        //$file->move("assets/img/users",$image);
            }
        $pdata = array(
          'gender' => $this->request->getVar('gender'),
            'dob' => $this->request->getVar('dob'),
            'state' => $this->request->getVar('state'),
            'lga' => $this->request->getVar('lga'),
            'address' => $this->request->getVar('address'),
           'passport' => $profile_img
        );
        $pdata2 = array(
            'pic' => $profile_img,
            'fname' => $this->request->getVar('fname'),
            'lname' => $this->request->getVar('lname'),
            'oname' => $this->request->getVar('oname'),
            'email' => $this->request->getVar('email'),
            'phone ' => $this->request->getVar('phone')
        );
      //  if(empty($pdata2['email'])){
            ///$message = "This Fields cannot be empty!";
        //}else{ //if ($file->move("agents/", $newfilename)) {
           // $model = new General_model();
           // $message = $model->updateprofile($pdata,$pdata2,$id);//}
        //}
       // echo json_encode(['message'=>$message]);
        //exit();


        $model = new General_model();
        $response = $model->updateprofile($pdata,$pdata2,$id);
        if(is_string($response)){
            $origin['error'] = $response;
        }else{
            //$id = $response['smart_info']['Citizen_ID'];
            $origin['data'] = $response;
            $origin['message'] = "User Profile successfully updated !";
        }
echo json_encode($origin);
    }
    // delete user info
   function delusers(){
        $id = $this->request->getVar('fid');
        $model = new General_model();
        $data = $model->deluser($id);
        echo json_encode($data);
    }
    // delete user info
    function delpro(){
        $id = $this->request->getVar('fid');
        $model = new General_model();
        $data = $model->delpro($id);
        echo json_encode($data);
    }
    // update user status
    function vuser(){ //extract($_POST);
        $id = $this->request->getVar('id');
        $db = \Config\Database::connect();
        $builder = $db->table('admin');
        $pdata = array(
            'active' => $this->request->getVar('status')
        );
        $result3 = $builder->update($pdata,['id' => $id]);
        echo json_encode($result3);
    }
    // verify property
    function vproperty(){ //extract($_POST);
        $id = $this->request->getVar('id');
        $db = \Config\Database::connect();
        $builder = $db->table('property_tb');
        $pdata = array(
            'pro_status' => $this->request->getVar('status'),
            'verify_by' => $this->request->getVar('ud')
        );
        $result3 = $builder->update($pdata,['id' => $id]);
        echo json_encode($result3);
    }

    public function euser($id = null)
    {   $db = \Config\Database::connect();
        $builder = $db->table('admin as atb');
        $builder->select("atb.*, atb.fname as fname,dtb.gender");
        $builder->join('details as dtb', 'atb.id = dtb.uid', "left"); // added left here
        $data = $builder->where('atb.id', $id)->get()->getResult();
        if($data){
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false));
        }
    }
    //load property
    public function fetchpro($id = null)
    {   $db = \Config\Database::connect();
        $builder = $db->table('property_tb as ptb');
        $builder2 = $db->table('assign_pro_feat_tb as ptf');
        $builder->select("ptb.*, ptb.pro_ref as prono,ttb.ptype,ttb.id,ltb.lga,ltb.lga_id");
        $builder->join('property_type as ttb', 'ptb.pro_type = ttb.id', "left"); // added left here
        $builder->join('lga_tb as ltb', 'ptb.lga = ltb.lga_id', "left"); // added left here
        $data = $builder->where('ptb.id', $id)->get()->getResult();
        $data2 = $builder2->where('ptf.pro_id', $id)->get()->getResult();
        if($data){
            echo json_encode(array("status" => true , 'data' => $data,'data2' => $data2));
        }else{
            echo json_encode(array("status" => false));
        }
    }
    //edit user details by admin
    public function updateUsers(){
        helper(['form', 'url']);
        $origin = array();
        $pcheck = $this->request->getVar('txtchk');
        $pass = $this->request->getVar('txtpass');
        if(!empty($pcheck)){$password = password_hash($pass,PASSWORD_DEFAULT); }else{
            $password = $pass;
        }
        $id = $this->request->getVar('txtcid');
        $pdata = array(
            'gender' => $this->request->getVar('txtgender')
        );
        $pdata2 = array(
            'username' => $this->request->getVar('txtuname'),
            'role' => $this->request->getVar('txtrole'),
            'fname' => $this->request->getVar('txtfname'),
            'lname' => $this->request->getVar('txtlname'),
            'oname' => $this->request->getVar('txtoname'),
            'email' => $this->request->getVar('txtemail'),
            'phone ' => $this->request->getVar('txtphone'),
            'pass' => $password
        );
        $model = new General_model();
        $response = $model->updateUsers($pdata,$pdata2,$id);
        if(is_string($response)){
            $origin['error'] = $response;
        }else{ $origin['data'] = $response;
            $origin['msg'] = $pdata2['username']." User Details Successfully updated !";
        }
        echo json_encode($origin);
    }

    //add user details by admin
    public function addUsers2(){
        helper(['form', 'url']);
        $origin = array();
        $pcheck = $this->request->getVar('txtchk');
        $pass = $this->request->getVar('txtpass');
        if(!empty($pcheck)){$password = password_hash($pass,PASSWORD_DEFAULT); }else{
            $password = $pass;
        }
        $id = $this->request->getVar('txtcid');
        $pdata = array(
            'gender' => $this->request->getVar('txtgender')
        );
        $pdata2 = array(
            'username' => $this->request->getVar('txtuname'),
            'role' => $this->request->getVar('txtrole'),
            'fname' => $this->request->getVar('txtfname'),
            'lname' => $this->request->getVar('txtlname'),
            'oname' => $this->request->getVar('txtoname'),
            'email' => $this->request->getVar('txtemail'),
            'phone ' => $this->request->getVar('txtphone'),
            'pass' => $password
        );
        $model = new General_model();
        $response = $model->updateUsers($pdata,$pdata2,$id);
        if(is_string($response)){
            $origin['error'] = $response;
        }else{ $origin['data'] = $response;
            $origin['msg'] = $pdata2['username']." User Details Successfully updated !";
        }
        echo json_encode($origin);
    }

    public function addUser()
    { helper(['form', 'url']);
        $model = new General_model();
        //generate simple random code
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($set), 0, 12);
        $data = array(
            'username' => $this->request->getVar('txtuname'),
            'role' => $this->request->getVar('txtrole'),
            'fname' => $this->request->getVar('txtfname'),
            'lname' => $this->request->getVar('txtlname'),
            'oname' => $this->request->getVar('txtoname'),
            'email' => $this->request->getVar('txtemail'),
            'active' => "1",
            'phone ' => $this->request->getVar('txtphone'),
            'trackno' => $code ,
            'pass' => password_hash($this->request->getVar('txtpass2'), PASSWORD_DEFAULT)
        );
        $data2 = array(
            'gender' => $this->request->getVar('txtgender')
        );
        $return_array = array();
        $save = $model->insert_users($data,$data2);
        if(is_string($save)){
           $return_array['error'] = $save;
        }else{
            $message = "<html>
						<head>
							<title>User Login Details</title>
						</head>
						<body>
							<h2>Your Account was Successfully Created on Rent Flexy.</h2>
							<p>Your Login Details:</p>
							<p>Username: ".$data['username']."</p>
							<p>Password: ".$this->request->getVar('txtpass2')."</p>
							<p>Kindly Login with the above details to complete your setup process .</p>
							<h4>Click to <a href='".base_url()."/admin'> Login Here</a></h4>
						</body>
						</html>";
            $smail = "akubesttech@gmail.com";
            if($this->sendMaild($message,$smail,$data['email'],'Rent Flexy','User Login Details')){
            $return_array['msg'] = $data['username']." User Details Successfully Added with Comfirmation email !";}else {
                $return_array['msg'] = $data['username']." User Details Successfully Added !";
            }$return_array['recd'] = $save;
        }
        echo json_encode($return_array);

    }
    public function gettype(){
        $model = new General_model();
        $tid = $this->request->getVar('tid');
        $types = $model->load_pro_type($tid);
        if(is_string($types)){
            $returnArray['error'] = $types;
        }else{
            $returnArray['b_types'] = $types;
        }
        echo json_encode($returnArray);
    }

    //add user details by admin
    public function postProperty(){
        helper(['form', 'url']);
        $model = new General_model();
        $urole = $this->request->getVar('urole');
        $id_numm = $this->request->getVar('id_num');
        if($urole == "4"){$pro_owner = $id_numm ;}else{$pro_owner = $this->request->getVar('txtpown');}
        $origin = array();
        $userdata = array(
            'pty_owner' => $pro_owner,
            'pro_ref' => $this->request->getVar('pro_ref'),
            'pro_what_to_do' => $this->request->getVar('txtpst'),
            'pro_agent' => $this->request->getVar('tstagent'),
            'pro_cate' => $this->request->getVar('txtcati'),
            'pro_type' => $this->request->getVar('txttype'),
            'lga' => $this->request->getVar('lga'),
            'pro_location' => $this->request->getVar('txtloc'),
            'no_of_bed' => $this->request->getVar('txtbedr'),
            'no_of_bathroom' => $this->request->getVar('txtbathr'),
            'cperiod' => $this->request->getVar('cperiod'),
            'amt_min' => $this->request->getVar('txtpmin'),
            'amt_max' => $this->request->getVar('txtpmax'),
            'state' => $this->request->getVar('state3')
        );
        $featdata = array('pro_id' => $this->request->getVar('pro_ref'),
            'pro_features' => $this->request->getVar('feat'));
        $imgdata = array('pro_id' => $this->request->getVar('pro_ref'),'pimg' => $this->request->getFileMultiple('pro_img'));
        $response = $model->savePty($userdata, $featdata, $imgdata);
        if(is_string($response)){  //getFileMultiple
            $origin['error'] = $response;
        }else{ $origin['data'] = $response;
            $origin['msg'] = "Property Details with reference No ".$userdata['pro_ref']." was Successfully Added !";
        }
        echo json_encode($origin);
    }

    //update property Details by admin
    public function updateProperty(){
        helper(['form', 'url']);
        $id = $this->request->getVar('txtpro_id');
        $model = new General_model();
        $urole = $this->request->getVar('urole');
        $id_numm = $this->request->getVar('id_num');
        if($urole == "4"){$pro_owner = $id_numm ;}else{$pro_owner = $this->request->getVar('txtpown');}
        $origin = array();
        $userdata = array(
            'pty_owner' => $pro_owner,
            'pro_what_to_do' => $this->request->getVar('txtpstn'),
            'pro_agent' => $this->request->getVar('txtagent'),
            'pro_cate' => $this->request->getVar('txtcatio'),
            'pro_type' => $this->request->getVar('txttypeo'),
            'lga' => $this->request->getVar('lga'),
            'pro_location' => $this->request->getVar('txtloc'),
            'no_of_bed' => $this->request->getVar('txtbedr'),
            'no_of_bathroom' => $this->request->getVar('txtbathr'),
            'cperiod' => $this->request->getVar('cperiod'),
            'amt_min' => $this->request->getVar('txtpmin'),
            'amt_max' => $this->request->getVar('txtpmax'),
            'state' => $this->request->getVar('state4')
        );
        $featdata = array('pro_features' => $this->request->getVar('feat'));
        $imgdata = array('pimg' => $this->request->getFileMultiple('pro_img'));
        $response = $model->updatePty($userdata, $featdata, $imgdata,$id);
        if(is_string($response)){  //getFileMultiple
            $origin['error'] = $response;
        }else{ $origin['data'] = $response;
            $origin['msg'] = "Property Details with reference No ".$userdata['pro_ref']." was Successfully Updated !";
        }
        echo json_encode($origin);
    }

}

?>