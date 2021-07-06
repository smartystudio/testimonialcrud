<?php

namespace SmartyStudio\TestimonialCrud\app\HttpView\Composers;

use Illuminate\View\View;
use SmartyStudio\TestimonialCrud\app\Models\Testimonial;

class TestimonialComposer
{
    public function compose(View $view)
    {
        $this->composePages($view);
    }

    public function composePages(View $view)
    {
        $view->with('testimonials', Testimonial::getTestimonials());
    }
}
