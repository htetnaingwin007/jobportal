<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\JobPost;


class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    protected $fillable = [
        'user_id',
        'company_name',

        'about_company',
        'company_phone',
        'company_address',
        
        'company_website',
        'total_employees',
        'company_logo',
    ];

    public $timestamp = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function jobPost()
    {
        return $this->hasMany(JobPost::class, 'user_id','user_id');
    }
}
