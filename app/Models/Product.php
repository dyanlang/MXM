<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [

        'pdNam',
        'pdImg',
        'pdPrc',
        'pdQty',
        'pdVar',
        'pdCat',
        'pdDef',
        'pdType',
        'pdWeight',
        'pdHeight',
        'pdLength',
        'stNam',

    ];

    protected $primaryKey = 'pID';
    protected $table = 'prdt_tb';
    public $timestamps = true;

    public function users()
    {
        $this->belongsTo(User::class, 'uID', 'id');
    }

    public function orders()
    {
        $this->hasOne(Order::class);
    }
}
