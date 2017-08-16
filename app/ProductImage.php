<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductImage
 */
class ProductImage extends Model
{
    protected $fillable = [
        'image', 'product_id',
    ];

    /**
     * Get the product record associated with this product image
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
