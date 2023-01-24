<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Slider;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index ()
    {
        $sliders = Slider::all();
        return view('announcement.slider', compact('sliders'));
    }

    public function create ()
    {
        return view ('announcement.create');
    }

    public function store (SliderFormRequest $request)
    {
        $validatedData = $request -> validated();

        if($request->hasFile('image')){
            $file = $request->validated('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time () .'.'. $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] ="uploads/slider/$filename";
        }
        $validatedData['status'] = $request->gc_status == true ? '1':'0';

        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);
        
        return redirect('sliders')->with('message', 'Slider Added Successfully');
    }
}
