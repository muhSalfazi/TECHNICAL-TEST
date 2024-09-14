<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\BookController;
use App\Http\Controllers\api\MemberController;
use App\Http\Controllers\api\BorrowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Routes for Members
Route::get('/members', [MemberController::class, 'index']); // Menampilkan semua anggota
Route::get('/members/{id}', [MemberController::class, 'show']); // Menampilkan detail anggota
Route::get('/members/{id}/status', [MemberController::class, 'memberStatus']); // Status anggota, termasuk buku yang sedang dipinjam

// Routes for Books
Route::get('/books', [BookController::class, 'index']); // Menampilkan semua buku
Route::get('/books/available', [BookController::class, 'availableBooks']); // Menampilkan buku yang tersedia


// Routes for Borrow (Peminjaman Buku)
Route::post('/borrow/{member_id}/{book_id}', [BorrowController::class, 'borrowBook']); // Anggota meminjam buku
Route::post('/return/{member_id}/{book_id}', [BorrowController::class, 'returnBook']); // Anggota mengembalikan buku