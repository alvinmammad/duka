<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttributeValue extends Model
{
    use HasFactory;
    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function attribute(): BelongsTo {
        return $this->belongsTo(Attribute::class);
    }

    public function orderItem():HasMany{
        return $this->hasMany(OrderItem::class);
    }

    public function coupons():HasMany {
        return $this->hasMany(Coupon::class);
    }
}
