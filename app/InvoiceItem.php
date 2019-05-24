<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
     protected $fillable = [
        'item_name',
        'item_id',
        'item_price',
        'item_qty'
    ];

}
