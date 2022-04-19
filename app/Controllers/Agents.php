<?php
/**
 * Created by PhpStorm.
 * User: akubest
 * Date: 12/22/2021
 * Time: 10:11 AM
 */

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Usersignup;
use App\Models\General_model;

class Agents extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form','menu']);
    }
    public function index()
    {  $page_data['title'] = "Agents";
        $page_data['stpage'] = 1;
        //return view('welcome_message');
        echo view('general/header',$page_data);
        echo view('frontend/Agents');
        echo view('general/scripts');
        echo view('general/footer');
        //$this->load->view('frontend/index-script');
        echo view('general/end_tags');

    }
    public function main($pages = 'Agents'){
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