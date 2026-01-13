<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const STATUS_PENDING    = 'pending';
    public const STATUS_PROCESSING = 'processing';
    public const STATUS_READY      = 'ready';
    public const STATUS_COMPLETED  = 'completed';
    public const STATUS_CANCELLED  = 'cancelled';

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_address',
        'total',
        'status',
    ];

    public static function statuses(): array
    {
        return [
            self::STATUS_PENDING    => 'Pending',
            self::STATUS_PROCESSING => 'Sedang Diproses',
            self::STATUS_READY      => 'Siap Dikirim',
            self::STATUS_COMPLETED  => 'Selesai',
            self::STATUS_CANCELLED  => 'Dibatalkan',
        ];
    }
}
