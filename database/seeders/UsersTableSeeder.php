<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@felula.com')->first();

        if (!$user){
            User::create([

                'name'=>'Felula Admin',
                'email'=>'admin@felula.com',
                'password'=> Hash::make('123456'),
                'role' =>'admin'
            ]);
        }
    }
}
