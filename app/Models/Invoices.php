<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoices extends Model
{
    use HasFactory;
    use SoftDeletes;



     // $a = (int)$invo->unit_price;
    //  $a = 10;
     // //  $b = (int)$invo->quantity;
     // $b = 2000;
     // $total = $a * $b
}
