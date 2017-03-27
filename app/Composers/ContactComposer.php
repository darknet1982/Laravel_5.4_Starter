<?php
namespace App\Composers;

use App\Models\ContactForm;
use App\Transformers\ContactTransformer;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

/**
 *
 * Attaches a count of pending players to the admin sidebar
 *
 * @package App\Composers
 */
class ContactComposer
{
    public function compose(View $view)
    {
        $contact = ContactForm::findOrFail(1);

        $view->with('contact', fractal()->item($contact, new ContactTransformer())->toArray());
    }
}