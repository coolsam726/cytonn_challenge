<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function users() {
        return $this->belongsToMany(User::class, "product_user")->withPivot(["subscription_date"]);
    }
    public function transactions() {
        return $this->hasMany(Transaction::class,"product_id", "id");
    }
    public function productType() {
        return $this->belongsTo(ProductType::class);
    }
}
