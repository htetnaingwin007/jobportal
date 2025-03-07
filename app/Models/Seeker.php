<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\JobPost;



class Seeker extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'phone',

        'location',
        'socail_media',
        'resume',
        'skill',
        'workexperience',
        'bio',
        'image',
        'date_of_birth',
    ];

    public $timestamp = true ;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function jobPost()
    {
        return $this->hasMany(JobPost::class, 'user_id','user_id');
    }
}
