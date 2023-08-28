<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Auth;
use Image;
use Session;

class BuyerController extends Controller
{
    public function index()
    {
        $users = User::latest('created_at')->get();
        return view('users.settings', ['users' => $users]);
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

    	return view('users.settings', array('user' => Auth::user()) );

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
        return redirect('/settings');
    }
    


    public function show(User $user)
    {
        $users = User::find($user);
        return view('users.settings', compact('users'));
    }


    public function edit(User $user)
    {   
        return view('users.settings_edit', compact('user'));
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

    public function switch_to_buyer($id)
    {
        $users = User::find($id);

        $users->uType = 0;

        $users->save();

        return redirect('/home');
    }

    public function switch_to_delman($id)
    {
        $users = User::find($id);

        $users->uType = 1;

        $users->save();

        return redirect('/home');
    }

    public function switch_to_seller($id)
    {
        $users = User::find($id);

        $users->uType = 2;

        $users->save();

        return redirect('/home');
    }

    public function view_shop($id)
    {

        $seller = User::find($id);

        $prod = Product::join('users_tb', 'users_tb.id', '=', 'prdt_tb.uID')
                ->where('prdt_tb.pdType', '!=', '0')
                ->get(['users_tb.*', 'prdt_tb.*']);

        return view('users.view_shop', compact('seller', 'prod'));
    }

}
