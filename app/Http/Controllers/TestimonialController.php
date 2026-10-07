<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(10);
        return view('admin.testimonials.testimonials', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        $data = $request->validated();
        // image uploading 
        // 1- get image
        $image = $request->image;
        // 2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- move image to my project
        $image->storeAs('testimonials', $newImageName, 'public');
        // 4- save new name to database record
        $data['image'] = $newImageName;

        Testimonial::create($data);
        return to_route('admin.testimonials.index')->with('success', __('keywords.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // image uploading 
            // 0- delete old image
            Storage::delete("public/testimonials/$testimonial->image");
            // 1- get image
            $image = $request->image;
            // 2- change it's current name
            $newImageName = time() . '-' . $image->getClientOriginalName();
            // 3- move image to my project
            $image->storeAs('testimonials', $newImageName, 'public');
            // 4- save new name to database record
            $data['image'] = $newImageName;
        }

        $testimonial->update($data);

        return to_route('admin.testimonials.index')
            ->with('success', __('keywords.successfully_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        Storage::delete("public/testimonials/$testimonial->image");
        $testimonial->delete();
        return to_route('admin.testimonials.index')->with('success', __('keywords.successfully_deleted'));
    }
}
