<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReviewController extends Controller
{

public function review()
    { 
    $sender = Auth()->user()->id;          // USER ID 

    DB::table('reviews')->insert([
    'uID' => $sender,
    'pID' => request('pID'),
    'sID' => request('sID'),
    'oID' =>request('oID'),
    'review' => request('review'),
    'rtype' => request('rtype'),
    'rating' => request('rating'),
    ]);
    return back()->with('sent', 'Review Sent!');
    }
}