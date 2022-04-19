<?php
/**
 * Created by PhpStorm.
 * User: akubest
 * Date: 12/21/2021
 * Time: 5:08 PM
 */

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\General_model;
class Property extends BaseController
{
    public function __construct()
{
    helper(['form', 'url', 'session','menu']);
    model('General_model');
    $this->session = \Config\Services::session();
}
    public function index()
    { $model = new General_model();
        $page_data['roles'] = $model->roles("1");
        $page_data['title'] = "Post Property";
        $this->load_pages('Post_property',$page_data,'rec_scr',0);
    }
    public function checkUser(){
// validate inputs
        $inputs = $this->validate([
            'uname' => [
                'label' => 'Uname',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Please enter your Username.',
                    'min_length' => 'Username is Required in the right format To Continue!.'
                ]
            ],
        ]);
        if (!$inputs) {
            $page_data['title'] = "Post Property";
            $page_data['validation'] = $this->validator;
            $this->load_pages('Post_property',$page_data,null,0);
        } else {
            $model = new General_model();
            $userdata = array(
                'username' => $this->request->getVar('uname') );
            $_SESSION['query_response'] = $model->addProperty($userdata);
            return redirect()->to(site_url('Property/addProperty'));
        }
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
     public function addProperty(){
         if(isset($_SESSION['query_response'])&& is_string($_SESSION['query_response'])){
             $_SESSION['infor_error'] = $_SESSION['query_response'];
             session()->setFlashdata('failed', $_SESSION['infor_error']);
             return redirect()->to(site_url('Property'));
         }else{
             $model = new General_model();
            $page_data['title'] = "Post Property";
             $page_data['pref'] = $model->generate_reference();
             $page_data['validation'] = $this->validator;
             $page_data['userd'] = isset($_SESSION['query_response']) ? $_SESSION['query_response'] : 0;
             $page_data['powner'] = $model->loaduser('3');
             $page_data['stat'] = $model->getstatus();
             $page_data['ptype'] = $model->load_pro_type();
             $page_data['pcat'] = $model->load_bus_categories();
             $page_data['pfeature'] = $model->load_p_feat();
             $this->load_pages('proform',$page_data,'scripts',2);
         }
    }
    public function create_pro()
    { $model = new General_model();
        $inputs = $this->validate([
            'txtpst' => [
                'label' => 'txtpst',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter Property what to do.',
                    'min_length' => 'Property what to do is Required!.'
                ]
            ],
            'txtcati' => [
                'label' => 'txtcati',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter Property Category.',
                    'min_length' => 'Property Category is Required!.'
                ]
            ],
            'txttype' => [
                'label' => 'txttype',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter Property Type .',
                    'min_length' => 'Property Type is Required!.'
                ]
            ],
            'state' => [
                'label' => 'state',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter Property State.',
                    'min_length' => 'Property State is Required!.'
                ]
            ],
            'lga' => [
                'label' => 'lga',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter Property LGA.',
                    'min_length' => 'Property LGA is Required!.'
                ]
            ],
            'txtloc' => [
                'label' => 'txtloc',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Please enter Property Address/Location.',
                    'min_length' => 'Property Address/Location is Required!.'
                ]
            ]
        ]);
        if (!$inputs) {
            $page_data['title'] = "Post Property";
            $page_data['validation'] = $this->validator;
            $page_data['userd'] = isset($_SESSION['query_response']) ? $_SESSION['query_response'] : 0;
            $page_data['powner'] = $model->loaduser('3');
            $page_data['stat'] = $model->getstatus();
            $page_data['ptype'] = $model->load_pro_type();
            $page_data['pcat'] = $model->load_bus_categories();
            $page_data['pfeature'] = $model->load_p_feat();
            $page_data['pref'] = $model->generate_reference();
            $this->load_pages('proform',$page_data,'scripts',2);
        } else {
            $userdata = array(
                'pty_owner' => $this->request->getVar('id_num'),
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
                'state' => $this->request->getVar('state')
            );
            $featdata = array('pro_id' => $this->request->getVar('pro_ref'),
                'pro_features' => $this->request->getVar('feat'));
            $imgdata = array('pro_id' => $this->request->getVar('pro_ref'),'pimg' => $this->request->getFileMultiple('pro_img'));
            //$model = new General_model();
            $response = $model->savePty($userdata, $featdata, $imgdata);
            if (is_string($response)) {
                $_SESSION['infor_error'] = $response;
                session()->setFlashdata('failed', $_SESSION['infor_error']);
                return redirect()->to(site_url('Property/addProperty'));
            } else {
               // if (isset($_SESSION['query_response'])) {
 //$owner_phone = $_SESSION['query_response']['applicant_details']['bio']['phone'];
//$_SESSION['reg_info'] = array('ref' => $response['property_reference'], 'owner' => $_SESSION['query_response']['applicant_details']['bio']['fname'] . ' ' . $_SESSION['query_response']['applicant_details']['bio']['lname']);
                //} ?>
                <script>
                    var refe = "<?=$response['pro_ref']?>";
                    alert("Your property reference No is " + refe);
                    location.assign("<?=site_url('Property')?>");
                </script>
                <?php
            }}}

    private function load_pages($page_name, $data = null,$p_script = null, $htype = 0)
    {
        if(!empty($htype)){
           if($htype == "2"){ echo view('general/header',$data); }else{
            echo view('general/header2');
            echo view('general/navbar');
            echo view('general/admin_sidebar');
           }
        }else{
            echo view('general/header3',$data);
        }
        if($data != null){
            if($htype == "2"){ echo view('frontend/'.$page_name,$data); }else{  echo view('backend/'.$page_name,$data);}
        }else{
            echo view('backend/'.$page_name);
        }
        if(!empty($htype)){
            if($htype == "2"){ echo view('general/footer'); }else{  echo view('general/footer2');}
        }else{
            echo view('general/footer3');
        }
        //echo view('general/scripts');
        if ($p_script != null){
            if($htype == "2"){  echo view('general/'.$p_script);}else{ echo view('backend/'.$p_script); }
        }
        echo view('general/end_tags');
    }
}