<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Post;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 120 ; $i++) {
            $newPost = new Post();
            $newPost->title = ucfirst($faker->realTextBetween(6, 16));
            $newPost->author = $faker->name() ;
            /* $newPost->user_id = $faker->numberBetween(0, User::count()); */
            $newPost->content = $faker->realText(400);
            $newPost->image_url = "https://picsum.photos/id/$i/450/550";
            $newPost->slug = Str::slug($newPost->title, '-')."$i";
            $newPost->save();

        }
    }
}
