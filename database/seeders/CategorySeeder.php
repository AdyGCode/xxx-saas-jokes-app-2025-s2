<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedCategories = [
            ['id' => 1, 'title' => 'unknown',],
            ['description' => 'This will not be added'],
            ['id' => 100, 'title' => 'pirate', 'description' => "Aaaaarrrrgh! Me Jocular hearties!",],
            ['title' => 'lightbulb', 'description' => 'Some bright spark thinks they are funny.',],
            ['title' => 'dad', 'description' => "Don't you love the bad jokes dad's tell.",],
            ['title' => 'pun', 'description' => 'These are usually very corny.',],
            ['title' => 'knock-knock', 'description' => 'You know you need to check the door...',],
        ];

        foreach ($seedCategories as $seedCategory) {

            // only insert the category if the title is not empty
            $title = $seedCategory['title'] ?? null;
            if (!is_null($title)) {

                $category = Category::firstOrCreate(
                    ['title' => $title],
                    $seedCategory
                );

            }
        }
    }
}
