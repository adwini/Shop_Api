<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlipTransactions extends Model
{
    use HasFactory;

    protected $table = 'sliptransactions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'shopId',
        'branchId',
        'date',
        'time',
        'custId',
        'receivedBy',
        'receivedDateTime',
        'slipno',
        'serviceType',
        'loadsqty',
        'loadsAmount',
        'loadsTotal',
        'detergentQty',
        'detergentAmount',
        'detergentTotal',
        'fabconQty',
        'fabconAmount',
        'fabconTotal',
        'bleachAty',
        'bleachAmount',
        'bleachTotal',
        'bounceAty',
        'bounceAmount',
        'bounceTotal',
        'babadQty',
        'babadAmount',
        'babadTotal',
        'perlaQty',
        'perlAmount',
        'perlaTotal',
        'dryQty',
        'dryAmount',
        'dryTotal',
        'othersQty',
    ];

    protected $casts = [
        'date' => 'date:Y-m-d'
    ];
}
