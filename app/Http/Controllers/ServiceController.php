<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreserviceRequest;
use App\Http\Requests\UpdateserviceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.services.services', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreserviceRequest $request)
    {
        $date =$request->validated();
        Service::create($date);
        return to_route('admin.services.index')->with('success', __('keywords.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(service $service)
    {
        return view('admin.services.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service $service)
    {
        return view('admin.services.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateserviceRequest $request, service $service)
    {
        $data = $request->validated();
        $service->update($data);
        return to_route('admin.services.index')->with('success', __('keywords.successfully_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service $service)
    {
        $service->delete();
        return to_route('admin.services.index')->with('success', __('keywords.successfully_deleted'));
    }
}
