<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatesettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        $setting = Setting::findOrFail(1);
        return view('admin.settings.index', get_defined_vars());
    }

 
    public function update(UpdatesettingRequest $request, setting $setting)
    {
        $data = $request->validated();
        $setting->update($data);
        return to_route('admin.settings.index')->with('success', __('keywords.successfully_updated'));
    }


}
