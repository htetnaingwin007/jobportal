<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'DESC')->get();
        return view('admin.companyprofiles.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companyprofiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $user = User::create($request->all());
        $user->save();
        // dd($user->id);
       

        $companyprofiles = Company::create(array_merge(['user_id' => $user->id], $request->all()));
        // dd($companyprofiles);
       
        $file_name_company = time().'.'.$request['company_logo']->extension(); //123412343434.png

        $upload_company = $request['company_logo']->move(public_path('images/company_logos/'),$file_name_company);
        if($upload_company){
            $companyprofiles->company_logo = "/images/company_logos/".$file_name_company;
        } 
        
        

        $companyprofiles->save();
        return redirect()->route('backend.company.index')
                        ->with('success','Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);
        return view('admin.companyprofiles.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, string $id)
    {
        $company = Company::find($id);
        $company->update($request->all());
        $company->save();

        $user = User::find($company->user_id);
        $user->update($request->all());
        $user->save();
        

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

       
        return redirect()->route('backend.company.index')
                        ->with('success','Company updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect()->route('backend.company.index');
    }
}
