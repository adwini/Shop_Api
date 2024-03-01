<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'custId',
        'lastName',
        'firstName',
        'middleName',
        'mobileno',
        'address1',
        'address2',
        'city',
        'vip',
        'trancount',
        'totalsales',
        'notes',
        'remark'
    ];
}
