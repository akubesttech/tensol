<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Member;

class UserController extends BaseController
{

    /**
     * constructor
     */
    public function __construct()
    {
        helper(['form', 'url']);
    }

    /**
     * User Registration form
     *
     * @return void
     */
    public function index()
    {
        echo view('frontend/registration');
    }

    /**
     * Register User
     *
     * @return void
     */
    public function create() {

        // validate inputs
        $inputs = $this->validate([
            'name' => [
                'label' => 'Name',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Please enter your name.',
                    'min_length' => 'Name must be atleast 5 characters long.'
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
            'phone' => [
                'label' => 'Mobile number',
                'rules' => 'required|numeric|regex_match[/^[0-9]{10}$/]',
                'errors' => [
                    'required' => 'Enter your mobile number.',
                    'numeric' => 'Mobile number must be a number.',
                    'regex_match' => 'Mobile number must be a valid mobile number.'
                ]
            ],
            'address' => [
                'label' => 'Address',
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Enter your address.',
                    'min_length' => 'Address must be atleast 10 characters long.'
                ]
            ]
        ]);

        if (!$inputs) {
            return view('frontend/registration', [
                'validation' => $this->validator
            ]);
        }

        // insert data
        $user = new Member;
        $user->save([
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'phone'  => $this->request->getVar('phone'),
            'address'  => $this->request->getVar('address')
        ]);

        session()->setFlashdata('success', 'Success! registration completed.');
        return redirect()->to(site_url('/member'));
    }
}