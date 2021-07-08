<?php

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