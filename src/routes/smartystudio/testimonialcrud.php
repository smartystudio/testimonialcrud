<?php

/**
 * Front-end routes
 */
Route::group(['prefix' => 'testimonial'], function () {
    Route::get('/', ['uses' => '\SmartyStudio\TestimonialCrud\App\Http\Controllers\TestimonialController@index']);
    Route::get('/{testimonial}/{subs?}', ['as' => 'view-testimonial', 'uses' => '\SmartyStudio\TestimonialCrud\App\Http\Controllers\TestimonialController@show'])
        ->where(['testimonial' => '^((?!admin).)*$', 'subs' => '.*']);
});

/**
 * Admin routes
 */
Route::group([
    'namespace' => 'SmartyStudio\TestimonialCrud\App\Http\Controllers\Admin',
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', backpack_middleware()],
], function () {
    Route::crud('testimonial', 'TestimonialCrudController');
});