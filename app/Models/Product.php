<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'name',
        'category',
        'price',
        'discount_percentage',
    ];

    protected $casts = [
        'price' => 'integer',
        'discount_percentage' => 'float',
    ];

    /**
     * Set a custom attribute for discount
     * If category = insurance, by default it's 30% off, unless otherwise set
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function discount(): Attribute
    {
        return Attribute::make(
            get: function () {
                return ($this->category == 'insurance' && is_null($this->discount_percentage))
                    ? 30
                    : $this->discount_percentage;
            }
        )->shouldCache();
    }

    /**
     * Set a custom attribute for currency.
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function currency(): Attribute
    {
        return Attribute::make(
            get: fn () => 'EUR'
        )->shouldCache();
    }

    /**
     * Set a custom attribute for final price.
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function finalPrice(): Attribute
    {
        return Attribute::make(
            get: function () {
                $discount = ($this->discount / 100) * $this->price;

                return is_null($this->discount)
                    ? $this->price
                    : $this->price - $discount;
            }
        )->shouldCache();
    }
}
