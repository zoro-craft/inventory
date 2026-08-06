<?php

namespace Tests\Feature;

use Tests\TestCase;

class CacheHeadersTest extends TestCase
{
    public function test_login_page_response_is_not_cached(): void
    {
        $response = $this->get(route('auth.login'));

        $response->assertOk();
        $response->assertHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->assertHeader('Pragma', 'no-cache');
        $response->assertHeader('Expires', '0');
    }
}
