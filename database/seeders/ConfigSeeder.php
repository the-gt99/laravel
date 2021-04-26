<?php

namespace Database\Seeders;

use Cron\HoursField;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'name' => 'last_currency_update',
            'value' => time(),
        ]);

        DB::table('currencies')->insert([
            'name' => 'interval_currency_update',
            'value' => config('constants.time.toSeconds.hour'),
        ]);
    }
}
