<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentsModel extends Model
{
	use SoftDeletes;

    // Table Name
    protected $table = 'comments';

    // Primary key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    // Delete Dates
    protected $dates = ['deleted_at'];
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'doc_id', 'parent_id', 'body'];
   
    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function replies()
    {
        return $this->hasMany(CommentsModel::class, 'parent_id');
    }
}
