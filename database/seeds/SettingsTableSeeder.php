<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert(
            "INSERT INTO `settings` (`id`, `genre`, `name`, `value`, `created_at`, `updated_at`) VALUES
            (1, 'pricing', 'services', '{\r\n\"proofreading\":\"0.125\",\r\n\"copyediting\":\"0.25\",\r\n\"publishing\":\"0\",\r\n\"cloudstorage\":\"0\"\r\n}', '2019-03-25 23:00:00', NULL)"
        );
    }
}
