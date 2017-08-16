<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 */
class Profile extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'avatar', 'user_id',
    ];

    /**
     * Get the user record associated with this profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
