<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecompanyRequest;
use App\Http\Requests\UpdatecompanyRequest;
use App\Models\company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = company::paginate(10);
        return view('admin.companies.companies', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecompanyRequest $request)
    {
        $data = $request->validated();
        // image uploading 
        // 1- get image
        $image = $request->image;
        // 2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- move image to my project
        $image->storeAs('companies', $newImageName, 'public');
        // 4- save new name to database record
        $data['image'] = $newImageName;
        company::create($data);
        return to_route('admin.companies.index')->with('success', __('keywords.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(company $company)
    {
        return view('admin.companies.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(company $company)
    {
        return view('admin.companies.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecompanyRequest $request, company $company)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // image uploading 
            // 0- delete old image
            Storage::delete("public/companies/$company->image");
            // 1- get image
            $image = $request->image;
            // 2- change it's current name
            $newImageName = time() . '-' . $image->getClientOriginalName();
            // 3- move image to my project
            $image->storeAs('companies', $newImageName, 'public');
            // 4- save new name to database record
            $data['image'] = $newImageName;
        }

        $company->update($data);
        return to_route('admin.companies.index')->with('success', __('keywords.successfully_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(company $company)
    {
        Storage::delete("public/companies/$company->image");

        $company->delete();
        return to_route('admin.companies.index')->with('success', __('keywords.successfully_deleted'));
    }
}
