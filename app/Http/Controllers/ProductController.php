<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Image;
use Auth;
use Session;
use DB;
use Carbon\Carbon;


class ProductController extends Controller
{

private $search;
  
    public function index(Request $request)
    {
$search = $request->search;
         
            $data = Product::join('users_tb', 'users_tb.id', '=', 'prdt_tb.uID')
                 ->where('pdNam',  'like', '%' . $search . '%')
                ->where('pdType', '1')
                ->get();
        $search = $search;

        return view('users.view_search_product', compact('data', 'search'));

    } 
   

    public function viewproducts()
    {
        $data = Product::all()->where('pdType', '1');

        return view('users.view_search_product', compact('data'));
    }

    // PAG VIEW NG STORE NG SELELR

    public function view_store(User $seller, $id)
    {
        $seller = User::join('prdt_tb', 'prdt_tb.uID', '=', 'users_tb.id')
        ->select('users_tb.*', 'prdt_tb.*')
        ->where('users_tb.id', $id)
        ->find($id);

        return view('users.view_store', compact('seller'));
    }



    public function get_sub_category( Request $request){

      $search = $request->search;
      $Pdsub1 = $request->Pdsub1;

        $data =   DB::table('prdt_tb AS Product')
        ->leftJoin('users_tb AS pf', 'pf.id', '=', 'Product.uID')
        ->selectRaw('pdImg AS cat_image')
        ->selectRaw('pID AS cat_id')
        ->selectRaw('pdNam AS cat_pdNam')
        ->selectRaw('pdPrc AS pdPrc')
        ->where('pdNam',  'like', '%' . $search . '%')
        ->WhereIn('Pdsub1', explode(",", $Pdsub1 ) )
        ->get(); 

   echo json_encode($data);    
    }

    public function byPopularity(Request $request){  

        
        $search = $request->get('search');
        $Pdsub1 = $request->get('Pdsub1');

      
           
         $data =   DB::table('prdt_tb AS Product')
            ->leftJoin('users_tb AS pf', 'pf.id', '=', 'Product.uID')
            ->selectRaw('pdImg AS cat_image')
            ->selectRaw('pID AS cat_id')
            ->selectRaw('pdNam AS cat_pdNam')
            ->selectRaw('pdPrc AS pdPrc')
            ->where('pdNam',  'like', '%' . $search . '%')
            ->orderby('pdNam', 'ASC')
            ->orWhereIn('Pdsub1', explode(",",$request->Pdsub1) )
            ->get(); 


            echo json_encode($data);    
            }

            

            public function byPrice(Request $request){  

        
                $search = $request->get('search');
                $Pdsub1 = $request->get('Pdsub1');
        
              
                   
                 $data =   DB::table('prdt_tb AS Product')
                    ->leftJoin('users_tb AS pf', 'pf.id', '=', 'Product.uID')
                    ->selectRaw('pdImg AS cat_image')
                    ->selectRaw('pID AS cat_id')
                    ->selectRaw('pdNam AS cat_pdNam')
                    ->selectRaw('pdPrc AS pdPrc')
                    ->where('pdNam',  'like', '%' . $search . '%')
                    ->orderby('pdPrc', 'ASC')
                    ->orWhereIn('Pdsub1', explode(",",$request->Pdsub1) )
                    ->get(); 
        
        
                    echo json_encode($data);    
                    }
        

          //---------------------------------------



  
}



