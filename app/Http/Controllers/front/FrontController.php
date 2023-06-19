<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Author;

class FrontController extends Controller
{
        public function frontCategory()
        {
            $categories = Category::all();

            return view('category', ['categories' => $categories]);
        }

        public function frontAuthor()
        {
            $authors = Author::all();

            return view('authorCard', compact('authors'));
        }
}
