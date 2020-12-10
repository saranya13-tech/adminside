<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
class FrontController extends Controller
{
    public function index()
    {
        
        return view('front.index',['slides' => DB::select('select * from ads where status=1 '),'category' => DB::select('select * from category where status=1 limit 5'),'latest' => DB::select('select * from products where status=1 and latest=1 limit 8'),'coming' => DB::select('select * from products where status=1 and coming=1 limit 8'),'featured' => DB::select('select * from products where status=1 and featured=1 limit 9'),'popular' => DB::select('select * from products where status=1 and popular=1 ')]);
    }
     public function contact()
    {
        
        return view('front.contact');
    }
     public function about()
    {
        
        return view('front.about');
    }
    public function all()
    {
         if (request()->has('id') && request()->input('id') != '') {
            $list = DB::select("SELECT * from products where category=".request()->input('id')." and status=1");
            
        }
        else if (request()->has('q') && request()->input('q') != '') {
            $list = DB::select("SELECT * from products where (name like '%" . request()->input('q') . "%' or sku like '%" . request()->input('q') . "%') and status=1");
            
        }
        else{
        	 $list =DB::select('select * from products where status=1 ');
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $productCollection = collect($list);
        $perPage = 20;
        $currentPageproducts = $productCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedproducts = new LengthAwarePaginator($currentPageproducts, count($productCollection), $perPage);
        if (request()->has('q') && request()->input('q') != '') {
            $paginatedproducts->setPath(request()->url() . '?q=' . request()->input('q'));
        } 
         else {
            $paginatedproducts->setPath(request()->url());
        }

        return view('front.all',['products' =>  $paginatedproducts,'category' => DB::select('select * from category where status=1')]);
    }
    public function single($id)
    {
        
        return view('front.product',['product' => DB::select('select * from products where id='.$id.' ')]);
    }
}
