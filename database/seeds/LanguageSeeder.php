<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('languages')->delete();
        \DB::table('languages')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'English',
                    'iso_code' => 'en',
                    'created_at' => '2016-03-17 11:00:00',
                    'updated_at' => '2016-03-17 11:00:00',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'French - Français',
                    'iso_code' => 'fr',
                    'created_at' => '2016-03-17 11:00:00',
                    'updated_at' => '2016-03-17 11:00:00',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Chinese (Simplified) - ‪简体中文',
                    'iso_code' => 'zh-cn',
                    'created_at' => '2016-03-17 11:00:00',
                    'updated_at' => '2016-03-17 11:00:00',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Japanese - 日本語',
                    'iso_code' => 'ja',
                    'created_at' => '2016-03-17 11:00:00',
                    'updated_at' => '2016-03-17 11:00:00',
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Vietnamese - Tiếng Việt',
                    'iso_code' => 'vi',
                    'created_at' => '2016-03-17 11:00:00',
                    'updated_at' => '2016-03-17 11:00:00',
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Korean - 한국어',
                    'iso_code' => 'ko',
                    'created_at' => '2016-03-17 11:00:00',
                    'updated_at' => '2016-03-17 11:00:00',
                ),
            6 =>
                array (
                    'id' => 7,
                    'name' => 'Spanish - Español',
                    'iso_code' => 'es',
                    'created_at' => '2016-03-17 11:00:00',
                    'updated_at' => '2016-03-17 11:00:00',
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => 'Thai - ‪ภาษาไทย',
                    'iso_code' => 'th',
                    'created_at' => '2016-03-17 11:00:00',
                    'updated_at' => '2016-03-17 11:00:00',
                ),
            )
        );
    }
}
