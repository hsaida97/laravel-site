<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = Blog:: all();
        foreach ($blogs as $blog) {
            $category = Category:: inRandomOrder()->first()->id;
            $user = User::where('id', '!=', 1)->inRandomOrder()->first()->id;
            $blog->update([
                'category_id' => $category,
                'user_id' => $user,
            ]);
        }
    }
}
