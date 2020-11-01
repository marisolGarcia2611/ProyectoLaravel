<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert(
            ['name'=>'Roberto_gogo'
            
        ]);
        DB::table('usuarios')->insert([
            'name'=>'Linda_buenRostro'
            
        ]);
      $usuarios=factory(App\usuarios::class,20)->create();
    }
}
