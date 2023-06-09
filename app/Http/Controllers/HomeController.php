<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Table;
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
        $data = Product::with('category')->get();
        return view('Admin.AllProduct',compact('data'))-> with('data', $data);
    }

    public function index()
    {
        if (Auth::id()) {
            $data = Product::with('category')->get();
            return view('Admin.AllProduct',compact('data'))-> with('data', $data);
        }
        else{
             return view('Auth.login');
        }
       
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
            $data = Product::with('category')->get();
           return view('admin.AllProduct',compact('data'))-> with('data', $data);
        }

        public function updateProduct($id)
        {
            $categorys =  Category::all(); 
            $data=Product::find($id);
            return view('admin.Update',compact('data'))-> with('categorys', $categorys);
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
            $data = Order::with('table')->get();
            return view('admin.Orders',compact('data'))-> with('data', $data);
        }


        public function upload_categorie(Request $request)
        {
            $cate=new Category();
                $image=$request->image;
                $imagename=time().'.'.$image->getClientoriginalExtension();
                $request->image->move('images',$imagename);
                $cate->icon=URL::to('/').'/images/'.$imagename;
                $cate->name_category=$request->name;
                
                $cate->save();
    
              return redirect()->back();
        }

        public function addCategory()
    {
        $categorys =  Category::all(); 
        return view('Admin.addCategory') ;
    }


    public function showcategory()
        {

            $data=Category::all();
            return view('admin.AllCategories',compact('data'))-> with('data', $data);
        }

        public function updateCategory($id)
        {
            $data=Category::find($id);
             return view('admin.UpdateCategory',compact('data'));
        }

    public function edite_categorie(Request $request,$id)
        {
        
            $data=Category::find($id);
            $data->name_category=$request->name;
            $image=$request->image;
            $imagename=time().'.'.$image->getClientoriginalExtension(); 
            $request->image->move('images',$imagename);
            $data->icon=URL::to('/').'/images/'.$imagename;

            
            $data->save();

            return redirect()->back();
            
        
        }

        public function delet_category($id)
        {
            $data=Category::find($id);
            $data->delete(); 
            return redirect()->back();   
        }

        public function upload_table(Request $request)
        {
            $table=new Table();               
                $table->name=$request->name;
                $table->save();
    
              return redirect()->back();
        }

        public function addTable()
        {
            $table=  Table::all(); 
            return view('Admin.addTable') ;
        }
    
        public function showtables()
        {
            $data=Table::all();
            return view('admin.AllTable',compact('data'))-> with('data', $data);
        }
        public function delet_table($id_table)
        {
            $data=Table::find($id_table);
            $data->delete(); 
            return redirect()->back();   
        }

        public function updateTable($id_table)
        {
            $data=Table::find($id_table);
             return view('admin.UpdateTable',compact('data'));
        }

    public function edite_table(Request $request,$id_table)
        {
        
            $data=Table::find($id_table);
            $data->name=$request->name;
           
            $data->save();

            return redirect()->back();
            
        
        }
}
