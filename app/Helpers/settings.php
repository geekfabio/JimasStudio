<?php

use App\Models\SiteSetting;

if (! function_exists('setting')) {
    function setting(string $key, mixed $default = null): mixed
    {
        return SiteSetting::get($key, $default);
    }
}

if (! function_exists('whatsapp_url')) {
    function whatsapp_url(string $message = ''): string
    {
        $number = preg_replace('/\D/', '', (string) setting('whatsapp_number', '244972465386'));
        $url = "https://wa.me/{$number}";

        if ($message !== '') {
            $url .= '?text=' . urlencode($message);
        }

        return $url;
    }
}
