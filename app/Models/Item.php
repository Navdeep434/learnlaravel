<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item_listing';


    protected $fillable = [
        'name', 'type', 'requested_on'
    ];

    protected $casts = [
        'requested_on' => 'datetime',
    ];



}
