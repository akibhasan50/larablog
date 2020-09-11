<?php

use App\Category;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       factory(App\User::class,3)->create()->each(function($u){
           $u->posts()->saveMany(

            factory(App\Post::class,rand(1,5))->make())
            ->each(function($c){

                $c->categories()->saveMany(
                    factory(App\Category::class,rand(1,5))->make()  
                );
            });
            
        });
    }
}
