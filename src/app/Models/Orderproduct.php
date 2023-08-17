<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderproduct extends Model
{
    use HasFactory;
    protected $table = 'order_product';

    protected $fillable = ['order_id', 'product_id', 'qte'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
