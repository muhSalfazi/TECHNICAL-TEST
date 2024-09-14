<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{

    // menampilkan semua buku
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    // menampilkan buku yang tersedia(yang blm di pinjam)
    public function availableBooks()
    {

       
        $books = Book::whereNull('borrowed_by')->get();

        return response()->json([
            'status'=>'sukses',
            'message'=>'data buku yang belum di pinjam',
            'buku'=>$books
        ]);
    }   

}
