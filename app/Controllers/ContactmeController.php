<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ContactmeController extends BaseController
{
    public function index()
    {
        return view('pages/contactme');
    }
    public function sendMessage()
    {
        
        // Load the email service
        $this->email = \Config\Services::email();
        // Validate the form data (you can add more validation rules as needed)
        $validationRules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|valid_email',
            'message' => 'required',
        ];
    
        $validator = \Config\Services::validation(); // Get the validation service
    
        if (!$this->validate($validationRules)) {
            // If validation fails, return an error response
            return $this->response->setJSON(['status' => 'error', 'message' => $validator->getErrors()]);
        }
    
        // Send email to your personal email address
        $this->email->clear();
    
        $this->email->setTo('realtorumesh@gmail.com'); // Replace with your actual email address
        $this->email->setSubject('You\'ve got a new message');
        
        // Create content for the email
        $emailContent = 'First Name : ' . $this->request->getPost('firstname') . '<br/>' .
                        'Last Name : ' . $this->request->getPost('lastname') . '<br/>' .
                        'Email : ' . $this->request->getPost('email') . '<br/>' .
                        'Message Content : ' . $this->request->getPost('message') . '<br/>';
    
        $this->email->setMessage($emailContent);
        $this->email->send();
        return $this->response->setJSON(['status' => 'success', 'message' => 'Message submitted successfully.']);
    }
}
