<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Items extends Eloquent {
    protected $collection = 'items_collection';
    protected $fillable = ['item_name', 'item_code'];
}