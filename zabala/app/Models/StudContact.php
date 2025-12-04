<?php

namespace App\Models;

use CodeIgniter\Model;

class StudContact extends Model
{
    // table for student contacts (create migration if missing)
    protected $table = 'stud_contact';
    protected $primaryKey = 'id';
    // allow storing the parent reference and contact details
    protected $allowedFields = ["personal_id", "contact", "email"];

}
