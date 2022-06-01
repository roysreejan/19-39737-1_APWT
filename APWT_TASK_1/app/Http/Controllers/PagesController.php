<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function product()
    {
        $product= array(
            'name' => 'Book name: Introduction to Laravel',
            'author' => 'Author name: Mr. X',
            'price' => 'price: 100Tk '
        );
        return view('pages.product')->with('data',$product);
    }
    
    public function ourTeams()
    {
        return view('pages.ourTeams');
    }
    public function aboutUs()
    {
        return view('pages.aboutUs');
    }
    public function contactUs()
    {
        return view('pages.contactUs');
    }
}
