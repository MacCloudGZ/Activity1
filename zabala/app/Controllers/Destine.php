<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Destine extends BaseController
{
    public function index()
    {
        return view('main');
    }

    public function save()
    {
        // Get POST data
        $name = $this->request->getPost('name');
        $address = $this->request->getPost('address');
        $contact = $this->request->getPost('contact');

        // Validate required field
        if (empty($name)) {
            return redirect()->back()->with('error', 'Name is required');
        }

        $modelPersonal = new \App\Models\PersonalInfo();
        $modelAddress = new \App\Models\StudAddress();
        $modelContact = new \App\Models\StudContact();

        // Insert personal info (required)
        $modelPersonal->insert(['name' => $name]);
        $personalId = $modelPersonal->getInsertID();

        // Insert address (if provided)
        if (!empty($address)) {
            $modelAddress->insert([
                'personal_id' => $personalId,
                'address' => $address,
            ]);
        }
        if (!empty($contact)) {
            $modelContact->insert([
                'personal_id' => $personalId,
                'contact' => $contact,
            ]);
        }

        return redirect()->to('/Ci4_Activity/zabala/')->with('message', 'Student information saved successfully!');
    }
}
