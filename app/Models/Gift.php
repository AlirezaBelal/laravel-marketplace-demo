<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'code', 'type', 'date_expire', 'price', 'value_price'];

    /** Unclaimed bearer cards or cards claimed by this account, while unexpired. */
    public function scopeSpendableBy(Builder $query, int $userId): Builder
    {
        return $query->where(function (Builder $query) use ($userId): void {
            $query->where(function (Builder $unclaimed): void {
                $unclaimed->where('type', 0)->whereNull('user_id');
            })->orWhere(function (Builder $claimed) use ($userId): void {
                $claimed->where('type', 1)->where('user_id', $userId);
            });
        })->where(function (Builder $query): void {
            $query->whereNull('date_expire')->orWhereDate('date_expire', '>=', today());
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
