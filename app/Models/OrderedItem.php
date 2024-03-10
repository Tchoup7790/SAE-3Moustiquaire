<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperOrderedItem
 */
class OrderedItem extends Model
{
    use HasFactory;

    protected $fillable = [
      'product_id',
      'order_id',
      'quantity',
      'price',
    ];
}
