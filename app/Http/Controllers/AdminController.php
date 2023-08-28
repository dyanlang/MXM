<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Image;
use Auth;
use Session;
use DB;


class AdminController extends Controller
{

    public function index()
    {
        $users = User::latest('created_at')->get();
        return view('admin.ad_details', ['users' => $users]);

    }


    public function seller_delman()
    {
        $scope = Auth::user()->uAsgn;

        $all_seller = User::where('activated_seller','a')->where('uCity', '=' , $scope)->get();
        $all_delman = User::where('activated_delman', 'a')->where('uCity', '=',  $scope)->get();

        $sCount = User::where('activated_seller','a')->where('uCity', '=' , $scope)->count();
        $pCount = User::where('activated_delman','a')->where('uCity', '=' , $scope)->count();

        return view('employee.accounts', compact('all_seller', 'all_delman', 'sCount', 'pCount'));
    }

    // public function all_users()
    // {
    //     $users = User::all();
    //     $adminU = User::where('uType', '5')->get();
    //     $empU = User::where('uType', '4')->get();
    //     $csU = User::where('uType', '3')->get();
    //     $sellerU = User::where('uType', '2')->get();
    //     $delmanU = User::where('uType', '1')->get();
    //     $buyerU = User::where('uType', '0')->get();

    //     return view('admin.ad_report', compact('users', 'adminU', 'empU', 'csU', 'sellerU', 'delmanU', 'buyerU'));

    // }

    public function emp_report()
    {

        $products = Product::join('users_tb', 'users_tb.id', '=', 'prdt_tb.uID')
                    ->select('users_tb.*', 'prdt_tb.*')
                    ->get();

        $sold = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')
                ->where('order_tb.oStat', '=', 'c')
                ->count();

        return view('employee.emp_report', compact('products', 'sold'));
    }

    public function app_dec()
    {
        $p_Del = User::where('delman_uReq', '1')->orderBy('id')->get();
        $p_Sel = User::where('seller_uReq', '3')->orderBy('id')->get();

        $pCount = User::where('delman_uReq', '1')->orderBy('id')->count();
        $sCount = User::where('seller_uReq', '3')->orderBy('id')->count();
    
        return view('/employee.approve_decline', compact('p_Del', 'p_Sel', 'pCount', 'sCount'));
    }
    

    public function view_user(User $users, $id)
    {
        // $auth = Auth::user()->id;

        $users = User::find($id);
        return view('admin.view_user', compact('users'));

    }

    public function view(User $users, $id)
    {
        $users = User::find($id);
        return view('employee.view_req', compact('users'));

    }


    public function seller_approve_req(Request $request, $id)
    {   
        $users = User::find($request->id);
        
        $users->seller_uReq = request('seller_uReq');
        $users->activated_seller = request('activated_seller');

        $users->save();

        Session::flash('seller_approve', 'Success! New Seller added.');

        return back();

    }

    public function seller_decline_req(Request $request,$id)
    { 
        $users = User::find($request->id);

        $users->seller_uReq = 0;
        $users->activated_seller = 'x';

        $users->save();
        
        return redirect('/verification'); 
    }

    public function delman_approve_req(Request $request, $id)
    {   
        $users = User::find($request->id);
        
        $users->delman_uReq = request('delman_uReq');
        $users->activated_delman = request('activated_delman');

        $users->save();

        Session::flash('delman_approve', 'Success! New Delivery Man added.');

        return back();

    }

    public function delman_decline_req(Request $request,$id)
    { 
        $users = User::find($request->id);

        $users->delman_uReq = 0;
        $users->activated_delman = 'x';

        $users->save();
        
        return redirect('/verification'); 
    }

    public function update_image(Request $request)
    {
    	// Handle the user upload of image

    	if ($request->hasFile('uImg')){

            request()->validate([
                'uImg' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:255',
            ]);
            
    		$uImg = $request->file('uImg');
    		$filename = time() . '.' . $uImg->getClientOriginalExtension();
    		Image::make($uImg)->resize(300, 300)->save( public_path('users/' . $filename) );

    		$user = Auth::user();
    		$user->uImg = $filename;
    		$user->save();
    	}

    	return view('/admin.ad_details', array('user' => Auth::user()) );

    }

    public function store(Request $request)
    {
        request()->validate([

            'lastname' => 'required', 'string', 'max: 50',
            'firstname' => 'required', 'string', 'max: 50',
            'middlename' => 'required', 'string', 'max: 50',
            'uBday' => 'date',
            'uGndr' => 'required', 'string', 'max: 6',
            'uMob' => 'required', 'string', 'digits: 13',
            'uHouseNo' => 'required', 'integer', 'max: 11',
            'uStrt' => 'required', 'string', 'max: 30',
            'uBrgy' => 'required', 'string', 'max: 30',
            'uProv' => 'required', 'string', 'max: 30',
            'uCity' => 'required', 'string', 'max: 30',
            'uZip' => 'required', 'char', 'max: 4',
        ]);

        
        $users = new User();

        $users->lastname = request('lastname');     
        $users->firstname = request('firstname');
        $users->middlename = request('middlename');
        $users->uBday = request('uBday');
        $users->uGndr = request('uGndr');
        $users->uMob = request('uMob');
        $users->uHouseNo = request('uHouseNo');
        $users->uStrt = request('uStrt');
        $users->uBrgy = request('uBrgy');
        $users->uProv = request('uProv');
        $users->uCity = request('uCity');
        $users->uZip = request('uZip');

        $users->save();    
        return redirect('/details');
    }

    public function show(User $user)
    {
        $users = User::find($user);
        return view('admin.ad_details', compact('users'));
    }

    public function edit(User $user)
    {   
        return view('admin.ad_details', compact('user'));
    }

    public function update($id)
    {
        $users = User::find($id);

        $users->lastname = request('lastname'); 
        $users->firstname = request('firstname');     
        $users->middlename = request('middlename');
        $users->uBday = request('uBday');
        $users->uGndr = request('uGndr');

        $users->uMob = request('uMob');
        $users->uHouseNo = request('uHouseNo');
        $users->uStrt = request('uStrt');
        $users->uBrgy = request('uBrgy');
        $users->uProv = request('uProv');
        $users->uCity = request('uCity');
        $users->uZip = request('uZip');
        
        $users->save();

        Session::flash('success');

        return back();
    }

    public function emp1_details()
    {
        return view('/employee.emp1_details');
    }

    public function cs_details()
    {
        return view('/customer_service.cs_details');
    }

    public function emp1_update($id)
    {
        $users = User::find($id);

        $users->lastname = request('lastname'); 
        $users->firstname = request('firstname');     
        $users->middlename = request('middlename');
        $users->uBday = request('uBday');
        $users->uGndr = request('uGndr');

        $users->uMob = request('uMob');
        $users->uHouseNo = request('uHouseNo');
        $users->uStrt = request('uStrt');
        $users->uBrgy = request('uBrgy');
        $users->uProv = request('uProv');
        $users->uCity = request('uCity');
        $users->uZip = request('uZip');
        
        $users->save();

        Session::flash('success');

        return back();
    }

    public function cs_update($id)
    {
        $users = User::find($id);

        $users->lastname = request('lastname'); 
        $users->firstname = request('firstname');     
        $users->middlename = request('middlename');
        $users->uBday = request('uBday');
        $users->uGndr = request('uGndr');

        $users->uMob = request('uMob');
        $users->uHouseNo = request('uHouseNo');
        $users->uStrt = request('uStrt');
        $users->uBrgy = request('uBrgy');
        $users->uProv = request('uProv');
        $users->uCity = request('uCity');
        $users->uZip = request('uZip');
        
        $users->save();

        Session::flash('success');

        return back();
    }

    public function cs_update_image(Request $request)
    {
    	// Handle the user upload of image

    	if ($request->hasFile('uImg')){

            request()->validate([
                'uImg' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:255',
            ]);
            
    		$uImg = $request->file('uImg');
    		$filename = time() . '.' . $uImg->getClientOriginalExtension();
    		Image::make($uImg)->resize(300, 300)->save( public_path('users/' . $filename) );

    		$user = Auth::user();
    		$user->uImg = $filename;
    		$user->save();
    	}

    	return view('/customer_service.cs_details', array('user' => Auth::user()) );

    }

    public function emp1_update_image(Request $request)
    {
    	// Handle the user upload of image

    	if ($request->hasFile('uImg')){

            request()->validate([
                'uImg' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:255',
            ]);
            
    		$uImg = $request->file('uImg');
    		$filename = time() . '.' . $uImg->getClientOriginalExtension();
    		Image::make($uImg)->resize(300, 300)->save( public_path('users/' . $filename) );

    		$user = Auth::user();
    		$user->uImg = $filename;
    		$user->save();
    	}

    	return view('/employee.emp1_details', array('user' => Auth::user()) );

    }

    public function ad_register()
    {

        return view ('admin.ad_register');
    }

    public function ad_message()
    {

        return view ('admin.ad_message');
    }

    public function create(Request $request)
    {
        request()->validate([

            'lastname' => ['required', 'string', 'max:50'],
            'firstname' => ['required', 'string', 'max:50'],
            'middlename' => ['nullable', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:10', 'unique:users_tb'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users_tb'],
            'uAsgn' => ['string', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'uType' => ['required'],
        
        
        ]);
    
    
        $users = new User();    
        $users->lastname = request('lastname');     
        $users->firstname = request('firstname');
        $users->middlename = request('middlename'); 
        $users->username = request('username'); 
        $users->email = request('email');
        $users->uAsgn = request('uAsgn');
        $users->password = Hash::make($request->password);
        $users->uType = request('uType');

        $users->save();

        Session::flash('success', 'Success! You have been successfully added new user!');

        return back();
        
       
    }


    public function ad_report(Order $oID)
    {
        $auth = Auth::user()->id;

        $users = User::all()->where('id', '!=', $auth);
        $adminU = User::where('uType', '5')->where('id', '!=', $auth)->get();
        $empU = User::where('uType', '4')->get();
        $csU = User::where('uType', '3')->get();
        $sellerU = User::where('uType', '2')->get();
        $delmanU = User::where('uType', '1')->get();
        $buyerU = User::where('uType', '0')->get();

        // $products = Product::all();
        // $orders = Order::all();

        $products = Product::join('users_tb', 'users_tb.id', '=', 'prdt_tb.uID')
                        // ->join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')
                        ->select('users_tb.*', 'prdt_tb.*')
                        ->get();

        $sold = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')
                        ->where('order_tb.oStat', '=', 'c')
                        // ->select('order_tb.*', 'prdt_tb.*')
                        ->count();

        $orders = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                        ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                        ->get(['users_tb.*', 'prdt_tb.*', 'order_tb.*']);



        return view('admin.ad_report', compact('users', 'adminU', 'empU', 'csU', 'sellerU', 'delmanU', 'buyerU', 'products', 'sold', 'orders'));

    }
 
    public function activate_user(Request $request, $id)
    {   
        $users = User::find($request->id);
        
        $users->uStat = 0;

        $users->save();

        return back();
  
        
    }

    public function deactivate_user(Request $request, $id)
    { 
        $users = User::find($request->id);

        $users->uStat = 1;

        $users->save();
        
        return back(); 
    }

    public function update_user_scope(Request $request, $id)
    { 
        $users = User::find($request->id);

        $users->uAsgn = request('uAsgn');

        $users->save();
        
        Session::flash('success1', 'Success! Scope has been updated!');

        return back(); 
    }

    public function view_shop($id)
    {

        $seller = User::find($id);

        $prod = Product::join('users_tb', 'users_tb.id', '=', 'prdt_tb.uID')
                // ->where('prdt_tb.uID', '=', $seller)
                ->where('prdt_tb.pdType', '!=', '0')
                ->get(['users_tb.*', 'prdt_tb.*']);

        return view('users.view_shop', compact('seller', 'prod'));
    }

    public function ban_product(Request $request, $pID)
    {
        $prod = Product::find($request->pID);

        $prod->pdType = 2;
        $prod->pdBan = 1;

        $prod->save();

        Session::flash('banned');
        
        return back(); 
    }
  
}
