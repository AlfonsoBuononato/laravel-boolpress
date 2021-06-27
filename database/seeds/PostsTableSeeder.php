<?php

use Illuminate\Database\Seeder;
use illuminate\support\Str;
use App\Post;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){

            $new_post = new Post();
            
            $new_post->title = 'Post title' . ($i + 1);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta porro, aliquam ullam, repellat unde deleniti tempore nihil iure delectus ex ipsam fuga? Expedita similique asperiores doloremque ex praesentium sint dicta?';

            $new_post->save();

        }
    }
}
