<?php

namespace App\Models;

use App\Events\BranchProductCreatedEvent;
use App\Events\BranchProductDeletedEvent;
use App\Events\BranchProductEditedEvent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BranchProduct extends Model
{
    use SoftDeletes;

    protected $table = "branch_products";
    protected $with = ["product"];
    protected $fillable = [
        'branch_id',
        'product_id',
        "category_id",
        "price",
        "discount",
        "discount_till",
        "wholesale",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    public $dispatchesEvents = [
        'created' => BranchProductCreatedEvent::class,
        'updated' => BranchProductEditedEvent::class,
        'deleted' => BranchProductDeletedEvent::class
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get all of the branchProduct's reviews.
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function getPriceAfterDiscountAttribute()
    {
        return $this->discount_till > Carbon::today() ? round($this->price - ($this->price / 100 * $this->discount)) : null;
    }

    public function getRateAttribute()
    {
        $reviewsSum = 0;
        $reviews = $this->reviews->where('published', 1);
        foreach ($reviews as $value) {
            $reviewsSum += $value->rate;
        }
        $reviewsSum != 0 ? $rate = ceil($reviewsSum/count($reviews)) : $rate = 0;

        return $rate;
    }

    public function getIsFavoriteAttribute()
    {
        if (auth()->check()) {
            return auth()->user()->favoritedProducts->contains('id', $this->id) ? true : false;
        }
    }

    public function getFinalPriceAfterDiscountAttribute()
    {
        return $this->discount_till > Carbon::today() ? round($this->price - ($this->price / 100 * $this->discount)) : $this->price;
    }
}
