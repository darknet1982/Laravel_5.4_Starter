<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ContactFormRequest as StoreRequest;
use App\Http\Requests\ContactFormRequest as UpdateRequest;

class ContactFormCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\ContactForm");
        $this->crud->setRoute("admin/contactform");
        $this->crud->setEntityNameStrings('Contact Form', 'Contact Form');

        if (env('APP_ENV') != 'local') {
            $this->crud->denyAccess(['create']);
        }

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->addFields([
            [ // Text
                'name' => 'title',
                'label' => "Title",
                'type' => 'text',
            ],
            [   // Textarea
                'name' => 'submissions_to',
                'label' => 'Form Recipients',
                'type' => 'textarea',
                'hint' => '<em>Email address to forward submissions to. Separate multiple address with a \' , \''
            ]
        ]);
    }

    public function store(StoreRequest $request)
    {
        $to_address = $request->input('submissions_to');
        $to_array = explode(',', $to_address);
        $request->request->set('submissions_to', $to_array);
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $to_address = $request->input('submissions_to');
        $to_array = explode(',', $to_address);
        $request->request->set('submissions_to', $to_array);
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
