<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;
use DB;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // joint table query

            // $subcategories = DB::table('subcategories')
            // ->select('subcategories.name','categories.name as category_name')
            // ->join('categories','categories.id','=','subcategories.category_id')
            // ->get();

        // one to many relationship query
        $subcategories = Subcategory::orderBy('id','desc')->get();

        // if you call " $subcategory->category ", you can get all category data corresponding with each subcategory

        return view('backend.subcategories.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.subcategories.create',compact('categories'));
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

        // Validation
        $request->validate([
            "name"=> "required"
        ]);

        // store data in Subcategory model
        $subcategory = new Subcategory;
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        // return
        return redirect()->route('subcategories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        return view('backend.subcategories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('backend.subcategories.edit',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        // Validation
        $request->validate([
            "name"=> "required"
        ]);

        // update data in Subcategory model
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        // return
        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
         $subcategory->delete();

        //return
        return redirect()->route('subcategories.index');
    }
}
