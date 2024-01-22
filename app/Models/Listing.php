<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /**
     * Method to get all the listings.
     */
    public static function getAll(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur consequatur dolorem dolores ea est exercitationem expedita facere ipsum laudantium modi molestiae molestias neque nesciunt odio officiis perspiciatis porro quaerat quas rem repellendus, sed soluta tempora totam vero voluptates. Consequuntur cupiditate doloribus fugit odio quaerat quibusdam quod repudiandae velit.'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci beatae ipsum nemo reiciendis soluta. Aperiam asperiores dicta eveniet maiores, modi mollitia omnis quisquam! A animi assumenda dicta, dolorum earum hic id inventore ipsum iusto minus natus perspiciatis sequi veritatis voluptates voluptatibus! Cupiditate doloribus exercitationem nesciunt praesentium, quis repellat soluta voluptatibus.'
            ]
        ];
    }

    /**
     * Method to get a listing based on id
     */
    public static function find(int $id): array
    {
        $listings = self::getAll();

        return array_filter($listings, function ($listing) use ($id) {
            return $listing['id'] === $id;
        });
    }
}
