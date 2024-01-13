<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();
        for($i=0;$i<5;$i++){
            Company::create([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'logo'=>'storage/images/logo.png',
                'website'=>$faker->url,
            ]);
        }
        for ($i=0;$i<20;$i++){
            Employee::create([
                'company_id'=>$faker->numberBetween(1,5),
                'first_name'=>$faker->firstName,
                'last_name'=>$faker->lastName,
                'email'=>$faker->email,
                'phone'=>$faker->phoneNumber,
            ]);
        }
        if(User::query()->where('name','=','admin')->count()<1){
            User::create([
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'password'=>Hash::make('password'),
            ]);
        }
    }
}
