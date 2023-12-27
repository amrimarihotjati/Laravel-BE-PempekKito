<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'ingredients',
        'price', 'rate', 'types', 'picturePatch'
    ];

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::parse($created_at)
            ->getPreciseTimestamp(3);
    }
    public function getUpdatedAtAttribute($updated_at)
    {
        return Carbon::parse($updated_at)
            ->getPreciseTimestamp(3);
    }

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['picturePatch'] = $this->picturePatch;
        return $toArray;
    }

    public function getPicturePatchAttribute()
    {
        return url('') . Storage::url($this->attributes['picturePatch']);
    }
}
