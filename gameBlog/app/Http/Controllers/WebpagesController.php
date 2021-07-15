<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebpagesController extends Controller
{
    public function index(){
        return view('webpages.index');
    }

    public function about(){
        return view('webpages.about');
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Advanced Secure Programming', 'Software Project', 'Serge Salcedo - x16483684']
        );
        return view('webpages.services') ->with($data);
    }
}
