<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario\Conta;

class ContaSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conta::create([            'type'      => 'comum',
        ]);

        Conta::create([
            'type'      => 'logista',
        ]);
    }
}
