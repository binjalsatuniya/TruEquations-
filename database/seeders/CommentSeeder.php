<?php

namespace Database\Seeders;

use App\Models\Feed;
use App\Models\Post;
use App\Models\Reel;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::chunk(100, function ($items) {
            $status = [true, false];
            foreach ($items as $item) {
                $parent = null;
                if ($status[array_rand($status)]) {

                    $parent = $item->comments()->inRandomOrder()->first()?->id ?? null;
                    

                }
                $data = [
                    "parent_id" => $parent,
                    'comment' => fake()->sentence(),
                    "user_id" => User::inRandomOrder()->first()->id,
                    'status' => $status[array_rand($status)],
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
                $item->comments()->create($data);
            }
        });
        Reel::chunk(100, function ($items) {
            $status = [true, false];
            foreach ($items as $item) {
                $parent = null;
                if ($status[array_rand($status)]) {
                    $parent = @$item->comments()->inRandomOrder()->first()?->id ?? null;
                }
                $data = [
                    "parent_id" => $parent,
                    'comment' => fake()->sentence(),
                    "user_id" => User::inRandomOrder()->first()->id,
                    'status' => $status[array_rand($status)],
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
                $item->comments()->create($data);
            }
        });
        Feed::chunk(100, function ($items) {
            $status = [true, false];
            foreach ($items as $item) {
                $parent = null;
                if ($status[array_rand($status)]) {
                    $parent = @$item->comments()->inRandomOrder()->first()?->id ?? null;
                }
                $data = [
                    "parent_id" => $parent,
                    'comment' => fake()->sentence(),
                    "user_id" => User::inRandomOrder()->first()->id,
                    'status' => $status[array_rand($status)],
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
                $item->comments()->create($data);
            }
        });
    }
}
