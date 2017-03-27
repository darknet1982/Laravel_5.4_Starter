<?php

namespace App\Transformers;

use App\Models\HomePage;
use League\Fractal\TransformerAbstract;

class HomePageTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(HomePage $homePage)
    {
        return [
            'id' => (int) $homePage->id
        ];
    }
}