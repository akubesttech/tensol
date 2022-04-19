<?php

namespace App\Controllers;
use App\Models\General_model;
use CodeIgniter\Controller;
class Welcome extends Controller
{
    public function __construct()
    {
        helper(['url', 'form','menu']);
        model('General_model');
    }
    public function index(){
        $props = array();
        $props['status'] = $this->getstatus();
        $model = new General_model();
        $props['p_type'] = $model->load_pro_type();
        $props['title'] = 'Welcome';
        //return view('welcome_message');
         echo view('general/header',$props);
        echo view('frontend/index',$props);
      echo view('general/scripts');
       echo view('general/footer');
        //$this->load->view('frontend/index-script');
         echo view('general/end_tags');

    }
    public function main($pages = 'index'){
        if(! is_file(APPPATH.'/Views/frontend/'.$pages.'.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($pages);
        }
        $data['title'] = ucfirst($pages); // Capitalize the first lette
        echo view('general/header',$data);
        echo view('frontend/'.$pages,$data);
        echo view('general/footer',$data);
        echo view('general/scripts',$data);
        echo view('general/end_tags',$data);
    }
   public function getstatus()
    {     $output = '';
        $arr = array("Rent" =>"1","Sales" =>"2","Non Building" =>"3");
        foreach($arr as $val => $nvalue)
        {$output .= '<option value="'.$nvalue.'">'.$val.'</option>';}
        return $output;}
    public function about($pages = 'About'){
        if(! is_file(APPPATH.'/Views/frontend/'.$pages.'.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($pages);
        }
        $data['title'] = ucfirst($pages); // Capitalize the first lette
        echo view('general/header',$data);
        echo view('frontend/'.$pages,$data);
        echo view('general/footer',$data);
        echo view('general/scripts',$data);
        echo view('general/end_tags',$data);
    }
}

