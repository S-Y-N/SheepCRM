<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    public function test_example(): void
    {
        //Перевіряємо чи є користувач в базі, якщо є - беремо першого
        $exuser = User::where('email','admin@admin.com')->first();
        //якщо немає - стврорити, його
        if(!$exuser){
            $user = User::factory()->create([
                'email'=>'admin@admin.com',
                'password'=>'password'
            ]);
        }else{
            $user = $exuser;
        }
        //автоматично аутентифікувати користувача на основі цього юзера
        $this->actingAs($user);
        //Стукамєо по шляху
        $response = $this->get('/employees');

        $response->assertStatus(200);
    }
}
