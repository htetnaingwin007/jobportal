<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\JobPost;
;



class Jobsaved extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'job_id',
        'user_id',
    ];

    public $timestamp = true;

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class, 'job_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
