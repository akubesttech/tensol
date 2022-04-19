<?php

namespace App\Controllers;
use CodeIgniter\Controller;
class Contact extends Controller
{
    public function __construct()
    {
        helper(['url', 'form','menu']);
    }
    public function index()
    { $props['title'] = 'Contact';
        //return view('welcome_message');
        echo view('general/header',$props);
        echo view('frontend/contact');
        echo view('general/scripts');
        echo view('general/footer');
        //$this->load->view('frontend/index-script');
        echo view('general/end_tags');

    }
    public function main($pages = 'contact'){
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