<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    public $fillable = [

        'uID',
        'oID',
        'dSel',
        'dRev',
        'dRev_Stat',
        'dAct',
        'aDate',

    ];

    protected $primaryKey = 'dID';
    protected $table = 'del_tb';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'uID', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'oID', 'oID');
    }

}
