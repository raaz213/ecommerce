<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $casts = [
        'images' => 'array',
       ];
        /**
         * Get the user that owns the Product
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function subcategory(): BelongsTo
        {
            return $this->belongsTo(Subcategory::class,'sub_category_id');
        }
        
       public function cart(){
        return $this->hasMany(Cart::class);
       }
}
