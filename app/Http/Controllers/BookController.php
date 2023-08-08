<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use App\Models\Creator;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with(['publisher', 'creator'])->get();

        return Inertia::render('Book/Index', [
            'books' => $books
        ]);
    }

    public function pivot($slug = null)
    {
        $slug_separator = '/';
        $slug_array = [];
    
        if(strpos($slug, $slug_separator) !== false) {
            $slug_array = explode('/', $slug);
        }

        if(!empty($slug_array)) {
            $publisher_id = Publisher::where('slug', $slug_array[0])->first()->id;
            $creator_id = Creator::where('slug', $slug_array[1])->first()->id;

            $books = Book::with(['publisher', 'creator'])->where('publisher_id', $publisher_id)->where('creator_id', $creator_id)->get();
            return Inertia::render('Book/Index', [
                'books' => $books
            ]);
        }else{
            $book = Book::where('slug', $slug)->first();
            if($book){
                return Inertia::render('Book/Detail', [
                    'book' => $book
                ]);
            }

            $publisher_id = null;
            $creator_id = null;
            $publisher = Publisher::where('slug', $slug)->first();
            $creator = Creator::where('slug', $slug)->first();

            $books = Book::query()->with(['publisher', 'creator']);

            if($publisher) {
                $books = $books->where('publisher_id', $publisher->id);
            }
            if($creator) {
                $books = $books->where('creator_id', $creator->id);
            }

            return Inertia::render('Book/Index', [
                'books' => $books->get()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $book = Book::where('slug', $slug)->first();

        return Inertia::render('Book/Detail', [
            'book' => $book
        ]);
    }
}
