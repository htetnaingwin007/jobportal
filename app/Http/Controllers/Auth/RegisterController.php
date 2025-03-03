<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Region;
use App\Models\Company;
use App\Models\Seeker;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;





class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |

    */
    

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        // upload image
      
            if (isset($data['image'])) {
                $file_name = time().'.'.$data['image']->extension(); //123412343434.png

                $upload = $data['image']->move(public_path('images/profiles/'),$file_name);
                if($upload){
                    $image = "/images/profiles/".$file_name;
                } else {
                    $image = 'noimage';
                }
            } else {
                $image = 'noimage';
            }

            if (isset($data['resume'])) {
                $file_name_resume = time().'.'.$data['resume']->extension(); //123412343434.png

                $upload_resume = $data['resume']->move(public_path('images/resumes/'),$file_name);
                if($upload_resume){
                    $resume = "/images/resumes/".$file_name;
                } else {
                    $resume = 'noimage';
                }
            } else {
                $resume = 'noimage';
            }

            if (isset($data['company_logo'])) {
                $file_name_company = time().'.'.$data['company_logo']->extension(); //123412343434.png

                $upload_company = $data['company_logo']->move(public_path('images/company_logos/'),$file_name_company);
                if($upload_company){
                    $company_logo = "/images/company_logos/".$file_name_company;
                } else {
                    $company_logo = 'noimage';
                }
            } else {
                $company_logo = 'noimage';
            }



        

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        if($data['role'] == 'seeker'){
            Seeker::create([
                'user_id' => $user->id,
                'phone' => $data['phone'],
                'location' => $data['location'],
                'socail_media' => $data['socail_media'],
                'skill' => $data['skill'],
                'date_of_birth' => $data['date_of_birth'],
                'image' => $image,
                'resume' => $resume,
               
                'workexperience' => $data['workexperience'],
                'bio' => $data['bio'],

            ]);
        }elseif($data['role'] == 'company'){
            Company::create([
                'user_id' => $user->id,
                'company_name' => $data['company_name'],
                'company_phone' => $data['company_phone'],
                'company_address' => $data['company_address'],
                'company_website' => $data['company_website'],
                'company_logo' => $company_logo,
                'total_employees' => $data['total_employees'],
                'about_company' => $data['about_company'],
            ]);
        }
        return $user;
    }
}
