<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'quantity_stock'
    ];
    
    public function user()
	{
		return $this->belongsTo(User::class);
	}
    public function category()
	{
		return $this->belongsTo(Category::class);
	}

    public function store()
	{
		return $this->belongsTo(Store::class);
	}

    public function cartItems()
	{
		return $this->hasMany(CartItem::class);
	}
}
