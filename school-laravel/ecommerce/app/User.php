<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent {
    protected $collection = 'users_collection';
    protected $fillable = ['item_id'];

    public function items() {
        return $this->hasMany(new \App\Items, '_id', 'item_id');
    }
}