<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;



class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id()){
            if(Auth::user()->usertype=='0')
            return view('Admin.dashboard');
        }
        return view('Admin.Home');
    }

    public function index()
    {
        
        return view('Auth.login');
    }

    public function addProduct()
    {
        $categorys =  Category::all(); 
        return view('Admin.addProduct') -> with('categorys', $categorys);
    }

    public function upload_product(Request $request)
    {
        $pro=new Product;
            $image=$request->image;
            $imagename=time().'.'.$image->getClientoriginalExtension();
            $request->image->move('images',$imagename);
            $pro->image=URL::to('/').'/images/'.$imagename;
            $pro->name=$request->name;
            $pro->prix=$request->prix;
            $pro->Description=$request->Description;
            $pro->id_category=$request->id_category;

            $pro->save();

          return redirect()->back();
    }

    public function showproducts()
        {

            $data=Product::all();
            return view('admin.AllProduct',compact('data'))-> with('data', $data);
        }

        public function updateProduct($id)
    
        {
            $data=Product::find($id);
             return view('admin.Update',compact('data'));
        }

        public function edite_product(Request $request,$id)
        {
        
            $data=Product::find($id);
            $data->name=$request->name;
            $data->prix=$request->prix;
            $data->description=$request->description;
            $data->id_category=$request->id_category;
            $image=$request->image;
            $imagename=time().'.'.$image->getClientoriginalExtension(); 
            $request->image->move('images',$imagename);
            $data->image=URL::to('/').'/images/'.$imagename;

            
            

            $data->save();

            return redirect()->back();
            
        
        }

        public function delet_product($id)
        {
            $data=Product::find($id);
            $data->delete(); 
            return redirect()->back();   
        }

        public function showOrders()
        {

            $data=Order::all();
            return view('admin.Orders',compact('data'))-> with('data', $data);
        }
    
}
