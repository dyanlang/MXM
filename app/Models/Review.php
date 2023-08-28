<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public $fillable = [

        'review',
        'rtype',

    ];


protected $primaryKey = 'rID';
protected $table = 'reviews';
public $timestamps = true;

public function user()
{
    return $this->belongsTo(User::class, 'uID', 'id');
}

}