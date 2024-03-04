<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\ClientRepository;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate', ['-vvv' => true]);
        $this->setUpPassport();
    }

    private function setUpPassport(): void
    {
        $clientRepository = new ClientRepository();
        $client = $clientRepository->createPersonalAccessClient(
            null, 'Test Personal Access Client', 'http://localhost'
        );
        config(['passport.personal_access_client.id' => $client->getKey()]);
        config(['passport.personal_access_client.secret' => $client->getPlainSecretAttribute()]);
    }
}
