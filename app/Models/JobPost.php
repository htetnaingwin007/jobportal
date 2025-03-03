<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Company;
use App\Models\Region;
use App\Models\Category;


class JobPost extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    protected $fillable = [
        'job_title',
        'user_id',
        'job_region_id',
        'job_type',
        'job_location',
        'vacancy',
        'experience',
        'salary',
        'gender',
        'application_deadline',
        'job_description',
        'responsibilities',
        'education_requirements',
        'other_benefits',
        'image',
        'category_id',

    ];

    public $timestamp = true;

    public function company()
    {
        return $this->belongsTo(Company::class, 'user_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class, 'job_region_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
