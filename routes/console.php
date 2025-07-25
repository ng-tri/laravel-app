<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('ping {host}', function ($host) {
    $this->info("Đang ping tới: $host");

    // Dùng shell_exec để thực hiện ping (hệ điều hành UNIX-based)
    $output = shell_exec("ping -c 4 $host 2>&1");

    if (str_contains($output, '0 packets received') || empty($output)) {
        $this->error("Ping thất bại. Không nhận được phản hồi từ $host.");
    } else {
        $this->info("Ping thành công:");
        $this->line($output);
    }
})->describe('Ping một địa chỉ host (domain hoặc IP)');