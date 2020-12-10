<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use DB;
class ProductController extends Controller
{
    public function index(){
    if(Cookie::get('user_id')){
        	 return view('admin.product.list', ['products' => DB::select('select * from products ')]);

        }else{
        	 return view('login');

        }
    }
    public function create(){
    if(Cookie::get('user_id')){
        	 return view('admin.product.create', ['categories' => DB::select('select * from category ')]);

        }else{
        	 return view('login');

        }
    }
    public function edit($id){
    if(Cookie::get('user_id')){
       
             return view('admin.product.edit', ['categories' => DB::select('select * from category '),'products'=> DB::select('select * from products where id='.$id.' '),]);

        }else{
             return view('login');

        }
    }
     public function store(Request $request)
    {
        $data = $request->except('_token', '_method',);
       

         if (request()->hasFile('cover') && request()->file('cover')) {

          $file = request()->file('cover');
           $file_name= $file->getClientOriginalName();
          $path = public_path() . '\images\product';
          $f=$file->move($path, $file->getClientOriginalName() );
            $data['cover'] =   "/images/product/".$file_name;
        }
         DB::table('products')->insert($data);
        

        


        
            return redirect()->route('products')->with('message', 'Create successful');
        
    }
    public function update(Request $request)
    {
        $data = $request->except('_token', '_method',);
       
        $id=request()->input('id');
         if (request()->hasFile('cover') && request()->file('cover')) {

          $file = request()->file('cover');
           $file_name= $file->getClientOriginalName();
          $path = public_path() . '\images\product';
          $f=$file->move($path, $file->getClientOriginalName() );
            $data['cover'] =   "/images/product/".$file_name;
        }
         DB::table('products')->where('id',$id)->update($data);
        

        


        
            return redirect()->route('products')->with('message', 'Create successful');
        
    }
    public function destroy()
    {
        $id=request()->input('id');
        DB::update('update products set status=0 where id=' . $id . '');

        return redirect()->route('products')->with('message', 'Delete successful');
    }
}
