<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Post;

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
            $newPost->title = ucfirst($faker->unique()->sentence());
            $newPost->author = $faker->name();
            $newPost->content = $faker->paragraphs(6, true);
            $newPost->image_url = "https://picsum.photos/id/$i/450/550";
            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->save();

        }
    }
}
