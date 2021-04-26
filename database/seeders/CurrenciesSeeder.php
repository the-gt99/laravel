<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'name' => "USD",
            'cost' => 1
        ]);
        //Стоило бы тут что-то да вызвать, чтобы оно впервые записало валюту
        //но я не понял как это сделать красиво, так шо теперь мы ждем крона, который все замутит)
    }
}
