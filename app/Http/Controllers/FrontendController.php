<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Subcategory;
use App\Category;
use App\Order;
use Auth;

class FrontendController extends Controller
{
    public function home($value='')
    {
        $categories = Category::all();
        $trend_items = Item::orderBy('id','desc')->take(8)->get();
        $items = Item::orderBy('id','desc')->get();

    	return view('frontend.home',compact('items','categories','trend_items'));
    }

    public function product($value='')
    {
        $categories = Category::all();
        $items = Item::orderBy('id','desc')->get();

        return view('frontend.product',compact('items','categories'));
    }

    public function productdetail($id)
    {
        $categories = Category::all();
        $item = Item::find($id);
        $related_items = Item::all();

    	return view('frontend.productdetail',compact('item','related_items','categories'));
    }

    public function cart($value='')
    {
        return view('frontend.cart');
    }

    public function contact($value='')
    {
    	return view('frontend.contact');
    }

    public function orderhistory($value='')
    {
        $orders = Order::where('user_id',Auth::id())
                ->orderBy('id', 'desc')
                ->get();
        return view('frontend.orderhistory',compact('orders'));
    }

    public function showItemsBySubcategory($id)
    {
        $categories = Category::all();
        $items = Item::where('subcategory_id',$id)->get();

        $subcategoryid = $id;
        
        return view('frontend.showItemsBySubcategory',compact('items','categories','subcategoryid'));
    }

    //register button
    public function signup($value='')
    {       
        return view('auth.register');
    }

}
