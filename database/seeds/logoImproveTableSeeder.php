<?php

use Illuminate\Database\Seeder;

class logoImproveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ロゴのイメージ
        \DB::table('logo_improves')->insert([
            [
                'improve_name'=>'さわやか'
            ],
            [
                'improve_name'=>'スタイリッシュ'
            ],
            [
                'improve_name'=>'シンプル'
            ],
            [
                'improve_name'=>'誠実'
            ],
            [
                'improve_name'=>'かっこいい'
            ],
            [
                'improve_name'=>'可愛い'
            ],
            [
                'improve_name'=>'ポップ'
            ],
            [
                'improve_name'=>'優しい'
            ],
            [
                'improve_name'=>'上品'
            ],
            [
                'improve_name'=>'平面的'
            ],
            [
                'improve_name'=>'立体的'
            ],
            [
                'improve_name'=>'個性的'
            ]
        ]);
    }
}
