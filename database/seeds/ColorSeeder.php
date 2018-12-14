<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert(['name' => 'Rose']);
        DB::table('colors')->insert(['name' => 'Noir']);
        DB::table('colors')->insert(['name' => 'Jaune']);
        DB::table('colors')->insert(['name' => 'Bleu']);
        DB::table('colors')->insert(['name' => 'Orange']);
        DB::table('colors')->insert(['name' => 'Rouge']);
        DB::table('colors')->insert(['name' => 'Vert']);
        DB::table('colors')->insert(['name' => 'Violet']);
        DB::table('colors')->insert(['name' => 'Brun']);
        echo "Add colors successful";
    }
}
