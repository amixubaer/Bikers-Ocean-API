<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    function addFaq(Request $request){

        $faq = new Faq;
        $faq->question = $request-> input('question');
        $faq->answer = $request-> input('answer');
        $faq-> save();
        return $faq;

    }

    function updateFaq($id, Request $request){

        $faq = Faq::find($id);
        $faq->question = $request-> input('question');
        $faq->answer = $request-> input('answer');
        $faq-> save();
        return $faq;
    }

    function deleteFaq($id){

        $result = Faq::where('id', $id) -> delete();
        if ($result){
            return ["result" => "FAQ has been deleted"];
        }
        else{
            return ["result" => "Operation Failed"];
        }
    }

    function Faq(){

        return Faq::all();
    }

}
