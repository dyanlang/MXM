<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use App\Models\Delivery;
use App\Models\Message;

use Illuminate\Http\Request;
use Image;
use Auth;
use Session;
use DB;
use Carbon\Carbon;


class VariationController extends Controller
{
    public function var(){
        $x ='x';
        $uID = Auth()->user()->id;

        $cartcount = Order::where('oStat', $x)
        ->where('uID', $uID)
        ->count('pID');

        return response()->json(['count' => $cartcount]);
    }
}
