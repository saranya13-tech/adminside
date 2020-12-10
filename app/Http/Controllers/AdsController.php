<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use DB;
class AdsController extends Controller
{
    public function index(){
    if(Cookie::get('user_id')){
        	 return view('admin.ads.list', ['ads' => DB::select('select * from ads ')]);

        }else{
        	 return view('login');

        }
    }
    public function create(){
    if(Cookie::get('user_id')){
        	 return view('admin.ads.create');

        }else{
        	 return view('login');

        }
    }
    public function edit($id){
    if(Cookie::get('user_id')){
       
             return view('admin.ads.edit', ['adss'=> DB::select('select * from ads where id='.$id.' '),]);

        }else{
             return view('login');

        }
    }
     public function store(Request $request)
    {
        $data = $request->except('_token', '_method',);
       

         if (request()->hasFile('image') && request()->file('image')) {

          $file = request()->file('image');
           $file_name= $file->getClientOriginalName();
          $path = public_path() . '\images\ads';
          $f=$file->move($path, $file->getClientOriginalName() );
            $data['image'] =   "/images/ads/".$file_name;
        }
         DB::table('ads')->insert($data);
        

        


        
            return redirect()->route('ads')->with('message', 'Create successful');
        
    }
    public function update(Request $request)
    {
        $data = $request->except('_token', '_method',);
       
        $id=request()->input('id');
         if (request()->hasFile('image') && request()->file('image')) {

          $file = request()->file('image');
           $file_name= $file->getClientOriginalName();
          $path = public_path() . '\images\ads';
          $f=$file->move($path, $file->getClientOriginalName() );
            $data['image'] =   "/images/ads/".$file_name;
        }
         DB::table('ads')->where('id',$id)->update($data);
        

        


        
            return redirect()->route('ads')->with('message', 'Create successful');
        
    }
    public function destroy()
    {
        $id=request()->input('id');
        DB::update('update ads set status=0 where id=' . $id . '');

        return redirect()->route('ads')->with('message', 'Delete successful');
    }
}
