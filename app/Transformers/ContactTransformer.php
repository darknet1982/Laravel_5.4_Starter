<?php

namespace App\Transformers;

use App\Models\ContactForm;
use League\Fractal\TransformerAbstract;

class ContactTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ContactForm $form)
    {
        return [
            'title' => $form->title
        ];
    }
}
