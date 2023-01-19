<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    use Uuid;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $appends = [
        'foto_url',
    ];
    public function getFotoUrlAttribute()
    {
        if ($this->foto && Storage::disk('products')->exists($this->foto)) {
            return Storage::disk('products')->url($this->foto);
        }

        return asset('noimage.png');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
