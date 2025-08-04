<?php

namespace App\Enums;

enum OrderStatus: int
{
    case Pending = 1;
    case Paid = 2;
    case Shipped = 3;
    case Completed = 4;
    case Cancelled = 5;

    public function label(): string
    {
        return match($this) {
            self::Pending => 'Chờ xử lý',
            self::Paid => 'Đã thanh toán',
            self::Shipped => 'Đã giao hàng',
            self::Completed => 'Hoàn tất',
            self::Cancelled => 'Đã hủy',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(function ($case) {
            return [$case->value => $case->label()];
        })->toArray();
    }
}
