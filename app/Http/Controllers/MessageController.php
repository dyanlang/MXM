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


class MessageController extends Controller
{
    public function message()
    { 
         // USER ID 
    $sender = Auth()->user()->id;          // USER ID 
    $unread = '1';

     DB::table('mes_tb')->insert(['sID' => request('sID'),
     'uID' => $sender,
     'mRead' => $unread,
     'mCon' => request('mCon'),
     ]);

    }

    public function message_update()
    { 
         // USER ID 
    $sender = Auth()->user()->id;          // USER ID 
    
    DB::table('mes_tb')
    ->where('uID', $sender)
    ->orWhere('sID', $id)
    ->update(['mRead' => '0' ]);

    
     return back()->with('added', 'Item successsfully added to cart!');  
    }


    // public function ad_mes()
    // { 
    // $sender = Auth()->user()->id;          // USER ID 
     
    // $chat = User::join('mes_tb', 'mes_tb.sID', '=', 'users_tb.id')
    // ->groupby('sID')
    // ->latest()
    // ->get()->except(Auth::id());

    // }

    // public function ad_mes_users()
    // { 
    // $sender = Auth()->user()->id;          // USER ID 
    // // $users = User::where('uType', '4')
    // // ->get()->except(Auth::id());
    // $users = User::all()->except(Auth::id()); //TEMPORARY FOR SAMPLE
    // return view ('admin.ad_message', compact('users'));

    // }

    public function ad_mess($id)
    {       
     
        $sender = Auth()->user()->id;    

         $click = User::where('id', $id)
        ->get();

        $youSent = User::join('mes_tb', 'mes_tb.uID', '=', 'users_tb.id')
       
        ->where('mes_tb.sID', $sender ) 
        ->where('mes_tb.uID', $id )
        ->orWhere('mes_tb.sID', $id )
        ->orderby('mDate', 'DESC')
        ->get();


        $sender = Auth()->user()->id;          // USER ID 
  
        // $users = User::where('uType', '4')
        // ->get()->except(Auth::id());
    
        $users = User::all()->except(Auth::id()); //TEMPORARY FOR SAMPLE

        

        return view ('admin.ad_message', compact('click', 'youSent', 'users'));

    }

    public function user_message($id)
    {       
     
      
        $sender = Auth()->user()->id;    

         $click = User::where('id', $id)
        ->get();

        $youSent = User::join('mes_tb', 'mes_tb.uID', '=', 'users_tb.id')
       
        ->where('mes_tb.sID', $sender ) 
        ->where('mes_tb.uID', $id )
        ->orWhere('mes_tb.sID', $id )
        ->orderby('mCon', 'ASC')
        ->get();

 

        $sender = Auth()->user()->id;          // USER ID 
  
        $users = User::join('mes_tb', 'mes_tb.sID', '=', 'users_tb.id')
        ->whereIn('uType', [1, 2])
        ->orderby('mDate','desc')
         ->get()->except(Auth::id());

       
        //$users = User::all()->except(Auth::id()); //TEMPORARY FOR SAMPLE

        return view ('users.message', compact('click', 'youSent', 'users'));

    }



}
