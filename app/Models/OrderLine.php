<?php

namespace App;
namespace App\Models;
use App\Helpers\Currency;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    protected $fillable = ["couse_id", "order_id", "price"];

    protected $appends = [
        "formatted_price"
    ];

    public function order() {
        return $this->belongsTo(App\Models\Order::class);
    }

    public function course() {
        return $this->belongsTo(App\Course::class);
    }

    public function getFormattedPriceAttribute() {
        return Currency::formatCurrency($this->price, false);
    }
}
