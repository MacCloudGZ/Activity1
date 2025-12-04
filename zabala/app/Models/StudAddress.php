<?php

namespace App\Models;

use CodeIgniter\Model;

class StudAddress extends Model
{
    // matches migration: createTable('stud_address')
    protected $table            = 'stud_address';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ["personal_id", "address"];

}
