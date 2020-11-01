<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            ['name'=>'Eduardo',
            'persona_id'=>App\usuarios::all()->random()->id,
             'email'=>'lalo@gmail.com',
             'password'=>Hash::make('12345'),
             'tipoUsuario'=>'admin'
        ]);
        DB::table('users')->insert(
            ['name'=>'lili',
            'persona_id'=>App\usuarios::all()->random()->id,
             'email'=>'lili@gmail.com',
             'password'=>Hash::make('12345'),
             'tipoUsuario'=>'user'
        ]);
        DB::table('users')->insert(
            ['name'=>'lola',
            'persona_id'=>App\usuarios::all()->random()->id,
             'email'=>'lola@gmail.com',
             'password'=>Hash::make('12345'),
             'tipoUsuario'=>'user'
        ]);
        
    }
}
