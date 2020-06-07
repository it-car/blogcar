<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data =[
    		[
	    		'link_name' =>'广东轻院',
				'link_title' =>'国家示范性搞笑',
				'link_url' =>'https://map.baidu.com/',
				'link_order' =>'1'
	    	],
	    	[
	    		'link_name' =>'广东茂名',
				'link_title' =>'国家示范性城市',
				'link_url' =>'https://www.baidu.com/',
				'link_order' =>'2'
	    	],
	    	[
	    		'link_name' =>'茂名荔枝',
				'link_title' =>'想不想吃',
				'link_url' =>'https://map.baidu.com/',
				'link_order' =>'3'
	    	]
    	];
        DB::table('links')->insert($data);
    }
}
