<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public  function test_user_database()
    {
       User::factory()->create([
           'email'=>'admin@admin.com'
       ]);

        $this->assertDatabaseCount('users',1);

        $this->assertDatabaseHas('users',[
            'email'=>'admin@admin.com',
        ]);
    }

}
