<?php

namespace Tests\Feature\Api\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;
use Tests\TestCase;

class LoginApiTest extends TestCase
{
    public function testLoginSuccess()
    {
        $user = User::factory()->create([
            'email' => 'demo@tuanldas.me',
        ]);
        $this->post('api/auth/login', [
            'email' => $user->email,
            'password' => '123456'
        ])
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_at'
            ]);
    }

    public function testLoginErrorWhenPasswordIsWrong()
    {
        $user = User::factory()->create([
            'email' => 'demo@tuanldas.me',
        ]);
        $this->post('api/auth/login', [
            'email' => $user->email,
            'password' => '1234567'
        ])
            ->assertStatus(401)
            ->assertJson([
                "message" => "Unauthorized"
            ]);
    }

    public function testLoginErrorWhenEmailIsWrong()
    {
        User::factory()->create([
            'email' => 'demo@tuanldas.me',
        ]);
        $this->post('api/auth/login', [
            'email' => 'demo2@tuanldas.me',
            'password' => '123456'
        ])
            ->assertStatus(401)
            ->assertJson([
                "message" => "Unauthorized"
            ]);
    }
}
