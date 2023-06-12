<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = [true, false];
        $parent = null;
        if ($status[array_rand($status)]) {
            $parent = Comment::inRandomOrder()->first()->id;
        }
        return [
            "parent_id" => $parent,
            'comment' => fake()->sentence(),
            'file_path' => null,
            "user_id" => User::inRandomOrder()->first()->id,
            'status' => $status[array_rand($status)],
        ];

    }
}
