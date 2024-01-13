<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    //тест на перевірку шляху де таблиця компаній
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
        $response = $this->get('/companies');

        $response->assertStatus(200);
    }

    public function test_non_empty_table_companies()
    {
        $faker = Factory::create();
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
        $this->actingAs($user);

        Company::factory()->create([
            'name'=>$faker->name,
            'email'=>$faker->email,
            'website'=>$faker->url,
        ]);
        $response = $this->get('/companies');

        $response->assertStatus(200);
        $response->assertDontSee('No data available in table');
    }

}
