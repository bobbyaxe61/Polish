<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagesModel extends Model
{
    // Table Name
    protected $table = 'users_documents';

    // Primary key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    /**
     * Retrieve Comments
     *
     * @var array
     */
    public function comments()
    {
    	return $this->hasMany('App\CommentsModel','doc_id','id')->whereNull('parent_id')->get();
    }
}