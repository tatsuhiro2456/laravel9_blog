<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $min = 1;
        $max_category =3;
        $images = ["https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867852/cld-sample-3.jpg", "
        https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867834/samples/bike.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867833/samples/landscapes/girl-urban-view.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867831/samples/food/fish-vegetables.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867851/cld-sample.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867840/samples/landscapes/nature-mountains.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867838/samples/ecommerce/accessories-bag.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867838/samples/imagecon-group.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867840/samples/landscapes/nature-mountains.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867839/samples/cloudinary-group.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867837/samples/ecommerce/car-interior-design.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867837/samples/ecommerce/leather-bag-gray.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867835/samples/animals/three-dogs.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867836/samples/landscapes/architecture-signs.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867830/samples/animals/cat.jpg",
        "https://res.cloudinary.com/dgrrdt1vv/image/upload/v1662867830/samples/people/kitchen-bar.jpg",
        ];
        
        $count_images = count($images)-1;
        return [
            'title' => fake()->word(),
            'body' => fake()->text($maxNbChars = 10 ),
            'image' => $images[mt_rand($min, $count_images)],
            'category_id' =>mt_rand($min, $max_category),
            
        ];
    }
}
