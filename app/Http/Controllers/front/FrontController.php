<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
        public function frontCategory()
        {
            $categories = Category::all();

            return view('category', ['categories' => $categories]);
        }


        public function search(Request $request){
    
        // $searchTerm = $request->input('term');
        // $books = Book::all();
        // if($searchTerm){
        //     $books = Book::where('title', 'like', "%$searchTerm%")->get();
        // }
        // $orderBy = $request->input('order_by');
        // if ($orderBy === 'latest') {
        //     $books = $books->sortByDesc('created_at');
        // } elseif ($orderBy === 'name') {
        //     $books = $books->sortBy('title');
        // }
        // $category = $request->input('category');
        
        $searchTerm = $request->input('term'); // The search term entered by the user
$categoryName = $request->input('category'); // The category name to filter by

$books = Book::query()
    ->when($searchTerm, function ($query, $searchTerm) {
        $query->where('title', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('author', function ($query) use ($searchTerm) {
                $query->where('author_name', 'like', '%' . $searchTerm . '%');
            });
    })
    ->when($categoryName, function ($query, $categoryName) {
        $query->whereHas('categories', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        });
    })->get();

$orderBy = $request->input('order_by');
        if ($orderBy === 'latest') {
            $books = $books->sortByDesc('created_at');
        } elseif ($orderBy === 'name') {
            $books = $books->sortBy('title');
        }
        return view('book.search', compact('books'));
        }
}
