<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    function addTestimonial(Request $request){

        $testimonial = new Testimonial;
        $testimonial->name = $request-> input('name');
        $testimonial->file_path = $request-> file('file') -> store('testimonials');
        $testimonial->comment = $request-> input('comment');
        $testimonial-> save();
        return $testimonial;

    }

    function testimonial(){

        return Testimonial::all();
    }
}
