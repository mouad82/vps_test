<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\TestResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Set authorization token for APIs.
     *
     * @param User $user
     * @param int $serviceId
     *
     * @return void
     */
    protected function setAuthorizationHeader(User $user, int $serviceId = null)
    {
        /** @var User $user */
        $token = JWTAuth::customClaims(['service_id', $serviceId])->fromUser($user);
        $this->withHeader('Authorization', 'Bearer ' . $token);
    }

    /**
     * Override get method
     *
     * @return TestResponse
     */
    public function get($uri, $params = [], $headers = []): TestResponse
    {
        $server = $this->transformHeadersToServerVars($headers);
        return $this->call('GET', $uri, $params, [], [], $server);
    }
}
