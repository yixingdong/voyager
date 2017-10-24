<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = \App\Book::orderBy('order','ASC')->paginate(30);
        dd($books);
    }
}
