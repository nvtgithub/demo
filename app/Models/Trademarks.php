<?php

namespace App\Models;

use App\Services\Product\ProductService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trademarks extends Model
{
  use HasFactory;

  protected $table = 'trademarks';
  protected $primaryKey = 'id';
  protected $guarded = [];

  public function products()
  {
    return $this->hasMany(Product::class, 'trademark_id', 'id');
  }
}
