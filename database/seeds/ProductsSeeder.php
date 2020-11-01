<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            ['name'=>'Gafas',
            'precio'=>'34',
            'descripcion'=>'color rouse wold'
        ]);
        DB::table('products')->insert([
            'name'=>'Blusa',
            'precio'=>'55',
            'descripcion'=>'color rojo'
        ]);
      $products=factory(App\products::class,20)->create();
    }
}
