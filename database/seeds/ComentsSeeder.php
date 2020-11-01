<?php

use Illuminate\Database\Seeder;

class ComentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coments')->insert(
            ['mensaje'=>'muy bien producto',
            'product_id'=>App\products::all()->random()->id,
            'usuario_id'=>App\usuarios::all()->random()->id
        ]);
        DB::table('coments')->insert(
            ['mensaje'=>'muy mal producto',
        'product_id'=>App\products::all()->random()->id,
        'usuario_id'=>App\usuarios::all()->random()->id
        ]);
      $coments=factory(App\coments::class,20)->create();
    }
}
