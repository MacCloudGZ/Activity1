<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password'];
    // The users table in your database (from database_setup.sql) only defines
    // `created_at` and does not include `updated_at`. CodeIgniter's model
    // timestamp feature will attempt to write both fields when enabled.
    // To avoid the "Unknown column 'updated_at'" error, disable automatic
    // timestamps here. If you prefer timestamps, add an `updated_at` column
    // to your users table instead.
    protected $useTimestamps = false;

    public function attemptLogin($username, $password)
    {
        $user = $this->where('username', $username)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}