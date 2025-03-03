<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\JobPost;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyProfileUpdateRequest;

class CompanyController extends Controller
{
    public function companyProfile($id)
    {

        $company = Company::find($id);
        // dd($company);
        $listedJobs = JobPost::where('user_id', $company->user_id)
        ->orderBy('created_at', 'desc')
        ->paginate(3);

       

        return view('companies.company-profile',compact('company','listedJobs'));
    }

    public function companyProfileEdit()
    {
        $user = Auth::user();
        $company = Company::where('user_id', $user->id)->first();
        // dd($company);
        return view('companies.company-profile-edit',compact('company'));
    }

    public function companyProfileUpdate(CompanyProfileUpdateRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->update($request->all());
        $user->save();

        $company = Company::where('user_id', Auth::user()->id)->first();
        $company->update($request->all());

        if ($request->hasFile('company_logo')) {
            $file_name = time().'.'.$request->company_logo->extension();
            $upload = $request->company_logo->move(public_path('images/company_logos/'), $file_name);

            if ($upload) {
                $company->company_logo = "/images/company_logos/".$file_name;
            }
        } else {
            $company->company_logo = $request->old_image;
        }
        $company->save();

       
        return redirect()->route('company.profile', ['id' => $company->id])
                        ->with('success','Company profile updated successfully.');
    }

}
