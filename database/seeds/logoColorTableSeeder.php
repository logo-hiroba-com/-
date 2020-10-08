<?php

use Illuminate\Database\Seeder;

class logoColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ロゴの色
        \DB::table('logo_colors')->insert([
            [
                "color_code"=>"#191919"
            ],
            [
                "color_code"=>"#818181"
            ],
            [
                "color_code"=>"#1BB1E8"
            ],
            [
                "color_code"=>"#1E388E"
            ],
            [
                "color_code"=>"#981CA8"
            ],
            [
                "color_code"=>"#17AC34"
            ],
            [
                "color_code"=>"#E8E13A"
            ],
            [
                "color_code"=>"#964E21"
            ],
            [
                "color_code"=>"#FD6BCB"
            ],
            [
                "color_code"=>"#FC2222"
            ],
            [
                "color_code"=>"#FC8722"
            ],
            [
                "color_code"=>"#1B42E8"
            ]
        ]);
    }
}
