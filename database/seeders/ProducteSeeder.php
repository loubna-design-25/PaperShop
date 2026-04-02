<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProducteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Producte::insert([
            ['nom' => 'Bolígraf blau', 'descripcio' => 'Pack de 10 bolígrafs blaus BIC', 'preu' => 2.99, 'quantitat' => 100, 'imatge' => null],
            ['nom' => 'Llibreta A4', 'descripcio' => 'Llibreta de 100 fulls quadriculada', 'preu' => 3.50, 'quantitat' => 60, 'imatge' => null],
            ['nom' => 'Carpeta de anelles', 'descripcio' => 'Carpeta A4 amb 4 anelles', 'preu' => 4.99, 'quantitat' => 40, 'imatge' => null],
            ['nom' => 'Regla 30cm', 'descripcio' => 'Regla de plàstic transparent', 'preu' => 1.20, 'quantitat' => 80, 'imatge' => null],
            ['nom' => 'Estoig', 'descripcio' => 'Estoig doble cremallera', 'preu' => 6.99, 'quantitat' => 30, 'imatge' => null],
            ['nom' => 'Tisores', 'descripcio' => 'Tisores escolars punta rodona', 'preu' => 2.50, 'quantitat' => 50, 'imatge' => null],
            ['nom' => 'Cola de barra', 'descripcio' => 'Cola UHU 40g', 'preu' => 1.80, 'quantitat' => 70, 'imatge' => null],
            ['nom' => 'Calculadora', 'descripcio' => 'Calculadora científica Casio fx-82', 'preu' => 19.99, 'quantitat' => 25, 'imatge' => null],
        ]);
    }
}
