<?php
/**
 * Created by PhpStorm.
 * User: Rahul
 * Date: 9/20/2018
 * Time: 1:42 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->hasMany(User::class, 'currency_id');
    }
}