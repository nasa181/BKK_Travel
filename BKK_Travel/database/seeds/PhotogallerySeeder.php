<?php

use Illuminate\Database\Seeder;

class PhotogallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_of_item = DB::table('item')->count();
        for ($i=1;$i<=$num_of_item;$i++){
            if(DB::table('photo_gallery')->where('link_item_id','=',$i)->count() == 0){
                DB::table('photo_gallery')->insert(['link_item_id'=>$i]);
                echo 'insert link_item_id : ' ;
                echo $i;
                echo ' into photo gallery';
            }
        }
    }
}
