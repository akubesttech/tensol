<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
       // $this->load->view('general/head');
        //$this->load->view('frontend/index');
        //$this->load->view('general/footer');
       // $this->load->view('general/scripts');
        //$this->load->view('frontend/index-script');
       // $this->load->view('general/end_tags');
	}
}
