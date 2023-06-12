<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikeReactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::chunk(100, function ($items) {
            $status = [true, false];
            $type = ['like', 'haha', 'wow', 'angry', "sad"];
            foreach ($items as $item) {
                $data = [
                    'type' => $type[array_rand($type)],
                    "user_id" => User::inRandomOrder()->first()->id,
                    'status' => $status[array_rand($status)],
                ];
                $item->reacts()->create($data);
            }
        });

    }
}
