<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::paginate(10);
        return view('admin.members.members', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $data = $request->validated();
        // image uploading 
        // 1- get image
        $image = $request->image;
        // 2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- move image to my project
        $image->storeAs('members', $newImageName, 'public');
        // 4- save new name to database record
        $data['image'] = $newImageName;

        Member::create($data);
        return to_route('admin.members.index')->with('success', __('keywords.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('admin.members.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // image uploading 
            // 0- delete old image
            Storage::delete("public/members/$member->image");
            // 1- get image
            $image = $request->image;
            // 2- change it's current name
            $newImageName = time() . '-' . $image->getClientOriginalName();
            // 3- move image to my project
            $image->storeAs('members', $newImageName, 'public');
            // 4- save new name to database record
            $data['image'] = $newImageName;
        }
        $member->update($data);
        return to_route('admin.members.index')->with('success', __('keywords.successfully_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        Storage::delete("public/members/$member->image");
        $member->delete();
        return to_route('admin.members.index')->with('success', __('keywords.successfully_deleted'));
    }
}
