<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use DB;
class CategoryController extends Controller
{
     public function index(){
    if(Cookie::get('user_id')){
        	 return view('admin.category.list', ['category' => DB::select('select * from category ')]);

        }else{
        	 return view('login');

        }
    }
    public function create(){
    if(Cookie::get('user_id')){
        	 return view('admin.category.create');

        }else{
        	 return view('login');

        }
    }
    public function edit($id){
    if(Cookie::get('user_id')){
       
             return view('admin.category.edit', ['categories'=> DB::select('select * from category where id='.$id.' '),]);

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
          $path = public_path() . '\images\category';
          $f=$file->move($path, $file->getClientOriginalName() );
            $data['cover'] =   "/images/category/".$file_name;
        }
         DB::table('category')->insert($data);
        

        


        
            return redirect()->route('category')->with('message', 'Create successful');
        
    }
    public function update(Request $request)
    {
        $data = $request->except('_token', '_method',);
       
        $id=request()->input('id');
         if (request()->hasFile('cover') && request()->file('cover')) {

          $file = request()->file('cover');
           $file_name= $file->getClientOriginalName();
          $path = public_path() . '\images\category';
          $f=$file->move($path, $file->getClientOriginalName() );
            $data['cover'] =   "/images/category/".$file_name;
        }
         DB::table('category')->where('id',$id)->update($data);
        

        


        
            return redirect()->route('category')->with('message', 'Create successful');
        
    }
    public function destroy()
    {
        $id=request()->input('id');
        DB::update('update category set status=0 where id=' . $id . '');

        return redirect()->route('category')->with('message', 'Delete successful');
    }
}
