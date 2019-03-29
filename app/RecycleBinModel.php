<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecycleBinModel extends Model
{
    // Table Name
    protected $table = 'recycle_bin';

    // Primary key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;
}
