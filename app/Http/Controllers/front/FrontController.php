<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
        public function frontCategory()
        {
            $categories = Category::all();

            return view('category', ['categories' => $categories]);
        }
}
