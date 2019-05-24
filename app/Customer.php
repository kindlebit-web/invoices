<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Customer extends Model
{
    use SearchableTrait;

    const PAGE = 20;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [       
        'columns' => [
            'customer_name'     => 1,
            'customer_email'    => 1,
            'customer_phone'    => 1,
            'customer_location' => 1,
            'customer_zip'      => 1,
            'customer_city'     => 1,
            'customer_country'  => 1,
        ]
    ];

    protected $fillable = [
        'customer_name',
        'customer_id',
        'customer_email',
        'customer_phone',
        'customer_location',
        'customer_city',
        'customer_country',
        'customer_zip'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
