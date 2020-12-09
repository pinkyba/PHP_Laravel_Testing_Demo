<?php

namespace App\Http\Controllers;

use App\Item;
use App\Subcategory;
use App\Brand;
use Illuminate\Http\Request;
use DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = DB::table('items')
        // ->select('items.*','brands.name as brand_name', 'subcategories.name as subcategory_name')
        // ->join('brands','items.brand_id','=','brands.id')
        // ->join('subcategories','items.subcategory_id','=','subcategories.id')
        // ->get();


        $items = Item::orderBy('id','desc')->get();
        return view('backend.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        return view('backend.items.create',compact('subcategories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->photos[0]);

        // Validation
        // $request->validate([
        //     "photos" => "required|mimes:jpg,jpeg,png",
        //     "codeno" => "required",
        //     "name" => "required",
        //     "unit_price" => "required"
        // ]);

        //upload
        if($request->file()){
            // fileName => 624872374523_a.jpg
            $images = [];
            foreach ($request->photos as $photo) {
                $fileName = time().'_'.$photo->getClientOriginalName();
                // itemimg/624872374523_a.jpg
                $filePath = $photo->storeAs('itemimg',$fileName, 'public');

                $path = '/storage/'.$filePath;

                array_push($images, $path);
            }
            $json_images = json_encode($images, JSON_PRETTY_PRINT);            
        }

        // store data in Item Model
        $item = new Item;
        $item->photo = $json_images;
        $item->codeno = $request->codeno;
        $item->name = $request->name;
        $item->price = $request->unit_price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;
        $item->save();

        // return
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('backend.items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        return view('backend.items.edit',compact('item','brands','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // Validation
        // $request->validate([
        //     "photos" => "sometimes|mimes:jpg,jpeg,png",
        //     "codeno" => "required",
        //     "name" => "required",
        //     "unit_price" => "required"
        // ]);

        //upload
        if($request->file()){
            // fileName => 624872374523_a.jpg
            $images = [];
            foreach ($request->photos as $photo) {
                $fileName = time().'_'.$photo->getClientOriginalName();
                // itemimg/624872374523_a.jpg
                $filePath = $photo->storeAs('itemimg',$fileName, 'public');

                $path = '/storage/'.$filePath;

                array_push($images, $path);
            }
            $json_images = json_encode($images, JSON_PRETTY_PRINT);            
        }else{
            $json_images = $item->photo;
        }

        // update data in Item Model
        $item->photo = $json_images;
        $item->codeno = $request->codeno;
        $item->name = $request->name;
        $item->price = $request->unit_price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;
        $item->save();

        // return
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index');
    }
}
