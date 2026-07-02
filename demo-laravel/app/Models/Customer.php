<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $connection = 'northwind'; 
    protected $table = 'customers';
    protected $primaryKey = 'CustomerID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;         // No contiene created_at y updated_at
    protected $fillable = [
        'CustomerID',
        'CompanyName',
        'ContactName',
        'ContactTitle',
        'Address',
        'City',
        'Region',
        'PostalCode',
        'Country',
        'Phone',
        'Fax'        
    ];
}
