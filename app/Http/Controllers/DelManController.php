<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
use Session;
use Auth;
use DB;

class DelManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('delivery.delman_details');
    }

    // REQUEST LIST

    public function request_list()
    {
        $uID = Auth::user()->id;

        $requests = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->where('order_tb.del_ID', '=', $uID)
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*', 'order_tb.updated_at')
                ->get();

        $total_request = Order::where('oStat', 'w')->where('dAct', '1')->where('del_ID', $uID)->count();

        $total_request2 = Order::where('RFstatus', 'p')->where('RFdelman_act', '!=', ['ra','rd'])->where('del_ID', $uID)->count();

        return view('delivery.delman_request', compact('requests', 'total_request', 'total_request2'));

    }

    public function del_history()
    {
        $uID = Auth::user()->id;

        $del_H = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->where('order_tb.del_ID', '=', $uID)
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*', 'order_tb.updated_at', 'order_tb.oStat')
                ->get();

        $topick = Order::where('oStat', 'w')->where('dAct', '2')->where('del_ID', $uID)->count();
        $toship = Order::where('oStat', 'r')->where('del_ID', $uID)->count();
        $completed = Order::where('oStat', 'c')->where('del_ID', $uID)->count();
        $cancelled = Order::where('dAct', '3')->where('sAct', '1')->where('del_ID', $uID)->count();

        $topick2 = Order::where('RFstatus', 'p')->where('RFdelman_act', 'ra')->where('del_ID', $uID)->count();
        $toship2 = Order::where('RFstatus', 'r')->where('RFdelman_act', 'ra')->where('del_ID', $uID)->count();

        return view('delivery.delivery_history', compact('del_H', 'topick', 'toship', 'completed', 'cancelled', 'topick2', 'toship2'));

    }

    public function del_reg()
    {
        return view('auth.delman_register');
    }


    public function user_to_delman(Request $request, User $id)
    {
        $users = Auth::user();

        if ($request->hasFile('uVal_Id_1', 'uVal_Id_2', 'u2x2_Id')) {
                
            request()->validate([
            
                'uVal_Id_1' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:255',
                'uVal_Id_2' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:255',
                'u2x2_Id' =>  'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:255',
        
            ]);
            
            $uVal_Id_1 = $request->file('uVal_Id_1');
            $uVal_Id_1_file = time() . '.' . $uVal_Id_1->getClientOriginalExtension();
            Image::make($uVal_Id_1)->resize(300, 300)->save( public_path('valid_ID_1/' . $uVal_Id_1_file ) );

            $uVal_Id_2 = $request->file('uVal_Id_2');
            $uVal_Id_2_file = time() . '.' . $uVal_Id_2->getClientOriginalExtension();
            Image::make($uVal_Id_2)->resize(300, 300)->save( public_path('valid_ID_2/' . $uVal_Id_2_file ) );

            $u2x2_Id = $request->file('u2x2_Id');
            $u2x2_Id_file = time() . '.' . $u2x2_Id->getClientOriginalExtension();
            Image::make($u2x2_Id)->resize(300, 300)->save( public_path('2x2_BG/' . $u2x2_Id_file ) );

            $data = $request->input();
            $request->session()->put('Data', $data);

            $output = $request->session()->get('Data');

            $delman_uReq = $output['delman_uReq'];

            $users->uLoc = request('uLoc');
            $users->uVehicle = request('uVehicle');
            $users->uVal_Id_1 = $uVal_Id_1_file;
            $users->uVal_Id_2 = $uVal_Id_2_file;
            $users->u2x2_Id = $u2x2_Id_file;
            $users->delman_uReq = $delman_uReq;

            $query = $users->save();

            if ($query) {

                return back()->with('fail', 'Something went wrong, Please try again!');
            }

        }

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

    	return view('/delivery.delman_details', array('user' => Auth::user()) );

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $users = User::find($user);
        return view('delivery.delman_details', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        return view('delivery.delman_details', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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


    public function view_request(Order $orders, $oID)
    {

        $orders = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*', 'order_tb.uID')
                ->get()
                ->find($oID);

        $seller = Order::join('users_tb', 'order_tb.sID', '=', 'users_tb.id')
                ->join('prdt_tb', 'order_tb.pID', '=', 'prdt_tb.pID')
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*')
                ->find($oID);

        return view('delivery.view_request', compact('orders', 'seller'));
    }

    public function accept_req(Request $request, $oID)
    {
        $order = Order::find($request->oID);
        
        $order->dAct = 2;
        $order->aDate = strftime('%Y-%m-%d %H:%M:%S');

        $order->save();

        Session::flash('success2');

        return back();
        
    }

    public function decline_req(Request $request, $oID)
    {
        $orders = Order::find($request->oID);

        $orders->dReason = request('dReason');
        $orders->oStat = 's';
        $orders->dAct = 3;

        $orders->save();

        Session::flash('success3');

        return back();
        
    }

    public function delivered(Request $request, $oID)
    {
        $order = Order::find($request->oID);
        
        $order->dAct = 'd';
        $order->dDate = strftime('%Y-%m-%d %H:%M:%S');

        $order->save();

        Session::flash('delivered');

        return back();
        
    }

    public function delman_report()
    {
        $del_ID = Auth::user()->id;

        $orders = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->where('order_tb.del_ID', $del_ID)
                ->where('order_tb.uID', '!=', 'order_tb.sID')
                ->select('order_tb.uID', 'order_tb.sID', 'prdt_tb.*', 'order_tb.*')
                ->get();

        $cancelled = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->where('order_tb.del_ID', $del_ID)
                ->where('order_tb.uID', '!=', 'order_tb.sID')
                ->select('order_tb.uID', 'order_tb.sID', 'prdt_tb.*', 'order_tb.*')
                ->get();

        return view('delivery.delivery_report', compact('orders', 'cancelled'));

    }

    public function view_return_request(Order $orders, $oID)
    {

        $orders = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*', 'order_tb.uID')
                ->get()
                ->find($oID);

        $seller = Order::join('users_tb', 'order_tb.sID', '=', 'users_tb.id')
                ->join('prdt_tb', 'order_tb.pID', '=', 'prdt_tb.pID')
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*')
                ->find($oID);

        return view('delivery.view_return_req', compact('orders', 'seller'));
    }

    public function accept_rf_req(Request $request, $oID)
    {

        $order = Order::find($request->oID);
        
        $order->RFdelman_act = 'ra';

        $order->save();

        Session::flash('accept_rf_req');

        return back();

    }

    public function item_picked_up(Request $request, $oID)
    {

        $order = Order::find($request->oID);
        
        $order->RFstatus = 'r';

        $order->save();

        Session::flash('item_picked_up');

        return back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
