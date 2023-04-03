<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockHistory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'material_id',
        'added_qty',
        'out_qty',
        'current_qty',
        'old_qty',
    ];
}
