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
        DB::table('colors')->insert(['name' => 'pink']);
        DB::table('colors')->insert(['name' => 'gray']);
        DB::table('colors')->insert(['name' => 'black']);
        DB::table('colors')->insert(['name' => 'aqua']);
        DB::table('colors')->insert(['name' => 'posh']);
        DB::table('colors')->insert(['name' => 'mauve']);
    }
}
