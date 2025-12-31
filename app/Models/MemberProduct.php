<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'product_name',
        'description',
        'price',
        'category',
        'quantity',
        'sku',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    /**
     * Get the member that owns the product.
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}

