<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /**
     * Return fullname of email
     */
    public function fullname()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
