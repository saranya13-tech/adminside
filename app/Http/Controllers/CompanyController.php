<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use DB;
class CompanyController extends Controller
{
	public function index(){
    if(Cookie::get('user_id')){
        	 return view('admin.company.edit', ['companys' => DB::select('select * from company where id=1')]);

        }else{
        	 return view('login');

        }
    }
    public function update(Request $request)
    {
    	$id=$request->input('id');
        
        if (request()->hasFile('logo') && request()->file('logo') ) {

          $file = request()->file('logo');
           $file_name= $file->getClientOriginalName();
          $path = public_path() . '\images\logo';
          $f=$file->move($path, $file->getClientOriginalName() );
            $data['logo'] =  "/images/logo/".$file_name;
        }
         $data['name'] = $request->input('name');
        $data['aboutus'] = $request->input('aboutus');
        $data['description'] = $request->input('description');
        $data['twitter'] = $request->input('twitter');
        $data['whatsapp'] = $request->input('whatsapp');
        $data['instagram'] = $request->input('instagram');
        $data['facebook'] = $request->input('facebook');
        $data['snapchat'] = $request->input('snapchat');
        $data['address'] = $request->input('address');
        
        DB::table('company')->where('id',$id)->update($data);
        return redirect()->route('company')->with('message', 'Create successful');
    }

}
