<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * 信頼するプロキシ（全てのプロキシを信頼）
     */
    protected $proxies = '*';

    /**
     * 使用するヘッダー（全て信頼）
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
