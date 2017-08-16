<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 */
class Product extends Model
{
    protected $fillable = [
        'title', 'price', 'description', 'user_id',
    ];

    /**
     * Get the user record associated with this product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
