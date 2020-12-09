<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        // validation
        $request->validate([
            "name" => "required|max:35'",
            "photo" => "required|mimes:jpg,jpeg,png"
        ]);

        //upload
        if($request->file()){
            // fileName => 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('brandimg',$fileName, 'public');

            $path = '/storage/'.$filePath;
            
        }

        //store data into Category model
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();

        // return
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        // validation
        $request->validate([
            "name" => "required|max:35'",
            "photo" => "sometimes|mimes:jpg,jpeg,png"
        ]);

        //upload
        if($request->file()){
            // fileName => 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('brandimg',$fileName, 'public');

            $path = '/storage/'.$filePath;

            
        }
        else{
            $path = $request->oldphoto;
        }

        //update data into Category model
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();

        // return
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index');
    }
}
