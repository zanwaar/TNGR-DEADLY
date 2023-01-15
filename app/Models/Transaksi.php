<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
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
    const STATUS_TRUE = 'Konfirmasi Pembayaran';
    const STATUS_FALSE = 'Sedang di proses';
    const STATUS_SELESAI = 'Selesai';

    public function getStatusBadgeAttribute()
    {
        $badges = [
            $this::STATUS_TRUE => 'warning',
            $this::STATUS_FALSE => 'primary',
            $this::STATUS_SELESAI => 'success',
        ];

        return $badges[$this->status];
    }
    public function getStatusAttribute($value)
    {
        if ($value === 'Konfirmasi Pembayaran') {
            return 'Konfirmasi Pembayaran';
        }
        if ($value === 'Sedang di proses') {
            return 'Sedang di proses';
        }
        if ($value === 'Selesai') {
            return 'Selesai';
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
