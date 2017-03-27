<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Models\HomePage;
use App\Transformers\HomePageTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    protected $route;
    protected $site_title;

    public function __construct() {
        $this->route = Route::getFacadeRoot()->current()->uri();
        $this->site_title = 'Site Title';
    }

    public function home() {
        $homepage = fractal()->item(HomePage::findOrFail(1), new HomePageTransformer())->toArray();
        $meta = [
            'title' => 'Home | ' . $this->site_title,
            'description' => 'descriptions',
            'image' => '/images/theme/logo.png',
            'keywords' => ''
        ];

        return view('frontend.pages.home', [
            'homepage' => $homepage,
            'meta' => $meta,
        ]);
    }

    public function contact(Request $request) {
        $input_bag['email'] = '';
        $input_bag['name'] = '';
        $input_bag['phone'] = '';
        $input_bag['enquiry'] = '';

        $error_bag = [
            'success' => true,
            'error' => ''
        ];

        if ($request->isMethod('POST')) {
            $input_bag['email'] = trim($request->input('email', ''));
            $input_bag['name'] = trim($request->input('name', ''));
            $input_bag['phone'] = trim($request->input('phone', ''));
            $input_bag['enquiry'] = trim($request->input('enquiry', ''));

            // Validate inputs
            if ($input_bag['name'] == '') {
                $error_bag['success'] = false;
                $error_bag['error'] = 'Name field cannot be empty.';
            }
            if ($input_bag['email'] == '') {
                $error_bag['success'] = false;
                $error_bag['error'] .= '\nEmail field cannot be empty.';
            }
            if ($input_bag['enquiry'] == '') {
                $error_bag['success'] = false;
                $error_bag['error'] = '\nEnquiry field cannot be empty.';
            }

            if ($error_bag['success']) {
                $to = ContactForm::findOrFail(1)->submissions_to;
                Mail::send('emails.contact', compact('input_bag'), function($mail) use ($input_bag, $to) {
                    $mail->to($to)
                        ->from($input_bag['email'], $input_bag['name'])
                        ->subject('ADW Website - Contact Form Submission');
                });
            }
        }
        // Return with bags
        if ($request->has('ajax')) {
            return response()->json($error_bag);
        } else {
            return redirect('/contact');
        }
    }
}