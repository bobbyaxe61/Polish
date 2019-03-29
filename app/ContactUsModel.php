<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsModel extends Model
{
     // Table Name
    protected $table = 'contact_us';

    // Primary key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;
}