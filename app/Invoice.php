<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Invoice extends Model
{
    use SearchableTrait;

	const PENDING   = 'pending';

	const PAID      = 'paid';

	const CANCELLED = 'cancelled';
    
    const PAGE = 20;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [       
        'columns' => [
            'customer_id' => 1,
            'number'      => 1,
            'tax'         => 1,
            'status'      => 1,
            'notes'       => 1
        ]
    ];

     protected $fillable = [
        'customer_id',
        'number',
        'tax',
        'status',
        'notes'
    ];

    public function items() {
    	return $this->hasMany(InvoiceItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
