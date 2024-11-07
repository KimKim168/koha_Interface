<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\newsCategory;
use App\Models\newsSubCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\newsSubCategory>
 */
class newsSubCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = newsSubCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        // Retrieve all categories
        $categories = newsCategory::pluck('id')->toArray();

        // Define sub-categories based on categories
        $subCategories = [
            1 => ['Space Opera', 'Cyberpunk', 'Hard Science Fiction', 'Dystopian'],
            2 => ['Romantic Comedy', 'Historical Romance', 'Paranormal Romance', 'Erotic Romance'],
            3 => ['Psychological Thriller', 'Legal Thriller', 'Cozy Mystery', 'Police Procedural'],
            4 => ['Science Fiction', 'Non-Fiction', 'Fiction', 'Adventure'],
            5 => ['Healthy Eating', 'Vegetarian Cooking', 'Vegan Cooking', 'Desserts'],
            6 => ['Startup Business', 'Leadership', 'Motivational', 'Success Stories'],
            7 => ['Health and Fitness', 'Personal Development', 'Relationships', 'Mindfulness'],
            8 => ['DIY Projects', 'Gardening', 'Home Improvement', 'Crafts'],
        ];

        // Get a random category ID
        $categoryId = $this->faker->randomElement($categories);

        // Get sub-categories for the selected category
        $subcategoryNames = $subCategories[$categoryId] ?? [];


        // Choose a random sub-category name
        $subcategoryName = $this->faker->randomElement($subcategoryNames);

        return [
            'name' => $subcategoryName,
            'news_category_id' => $categoryId,
        ];
    }
}
