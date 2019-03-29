<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    // Table Name
    protected $table = 'settings';

    // Primary key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;
}
