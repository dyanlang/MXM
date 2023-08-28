<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [

        'uID',
        'pID',
        'oMode',
        'oTol',
        'oDate',
        'oDate',
        'pDate',
        'dDate',
        'oStat',
        'oRev',
        'oRev_Stat',
        'dNam',
        'oFee',
        'price',
        'updated_at',
        'created_at',

    ];

    protected $primaryKey = 'oID';
    protected $table = 'order_tb';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'uID', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'pID', 'pID');
    }

}
