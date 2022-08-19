<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Image;
use File;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::latest()->get();
        return view('dashboard.admin.slide.index')->with([ 'slides' => $slides , 'i' => 0 ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:slides'],
            'description' => ['required', 'string'],
            'serial' => ['required', 'integer', 'gt:0', 'unique:slides'],
            'image' => ['required','image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'status' => ['nullable', 'boolean']
        ]);
        
      
        $originalImage = $request->file('image');
        $thumbnailImage = Image::make($originalImage);
        
        $thumbnailPath = public_path('storage/images/slide/thumbnail/');
        $originalPath = public_path('storage/images/slide/images/');

        $img_generated_path = time().'_'.$originalImage->getClientOriginalName();

        $thumbnailImage->resize(1200,600)->save($originalPath.$img_generated_path);
        $thumbnailImage->resize(70,70)->save($thumbnailPath.$img_generated_path); 
                
        $data['image'] = $img_generated_path;
        Slide::create($data);
         
        return redirect()->route('slides.index')->with('message', 'Successfully created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        return view('dashboard.admin.slide.show')->with(['slide' => $slide]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        return view('dashboard.admin.slide.edit')->with(['slide' => $slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:slides,title,'.$slide->id],
            'description' => ['required', 'string'],
            'serial' => ['required', 'integer', 'gt:0','unique:slides,serial,'.$slide->id],
            'image' => ['nullable','image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'status' => ['nullable', 'boolean']
        ]);


        if ($request->hasFile('image')) {

            $thumbnailPath = public_path('storage/images/slide/thumbnail/');
            $originalPath = public_path('storage/images/slide/images/');

           
            $old_img = $originalPath.$slide->image;
            $old_thumb = $thumbnailPath.$slide->image;

            if(File::exists($old_img) && File::exists($old_thumb)){

                File::delete([$old_img, $old_thumb]);
            }

            $originalImage = $request->file('image');
            $thumbnailImage = Image::make($originalImage);
            
            
            $img_generated_path = time().'_'.$originalImage->getClientOriginalName();

            $thumbnailImage->resize(1200, 600)->save($originalPath.$img_generated_path);
            $thumbnailImage->resize(70, 70)->save($thumbnailPath.$img_generated_path); 
                    
            $data['image'] = $img_generated_path;
            $data['status'] = $request->has('status');
            $slide->update($data);

            return redirect()->route('slides.index')->with('message', 'Successfully updated');

        }else{
            
            $data['status'] = $request->has('status');
            $slide->update($data);
            return redirect()->route('slides.index')->with('message', 'Successfully updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        $thumbnailPath = public_path('storage/images/slide/thumbnail/');
        $originalPath = public_path('storage/images/slide/images/');

        $old_img = $originalPath.$slide->image;
        $old_thumb = $thumbnailPath.$slide->image;

        if(File::exists($old_img) && File::exists($old_thumb)){
            File::delete([$old_img, $old_thumb]);
        }
        $slide->delete();

        return redirect()->route('slides.index')->with('message', 'Successfully deleted');
    }
}
