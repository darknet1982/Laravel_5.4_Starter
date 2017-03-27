<?php

// Main App
Route::get('/', 'HomeController@home');
Route::post('/contact', 'HomeController@contact');

// Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'permissions:Edit Homepage'], function () {
        CRUD::resource('homepage', 'Admin\HomePageCrudController');
    });
    Route::group(['middleware' => 'permissions:Edit Contact Form'], function () {
        CRUD::resource('contactform', 'Admin\ContactFormCrudController');
        CRUD::resource('contactsubmissions', 'Admin\ContactSubmissionCrudController');
    });
});