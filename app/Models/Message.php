<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public $fillable = [

        'uID',
        'rNam',
        'mCon',
        'mDate',
       

    ];

    protected $primaryKey = 'uID';
    protected $table = 'mes_tb';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'uID', 'id');
    }

   

}

