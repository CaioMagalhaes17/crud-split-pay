<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $randomInt = rand(1,100);
        DB::table('produtos')->insert([
            'nome' => 'Produto ' . $randomInt,
            'descricao' => 'Descrição do Produto ' . $randomInt,
            'preco' => rand(1,100) . '.' . rand(1,99),
            'quantidade' => rand(100,900),
        ]);
    }
}
