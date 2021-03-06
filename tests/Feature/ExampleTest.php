<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    private $users;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->artisan('migrate:fresh');
        $this->users = User::factory(5)->create();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
        $this->assertDatabaseCount('users', 5);
    }
}
