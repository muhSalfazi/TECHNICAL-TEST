<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Member;
class BorrowController extends Controller
{
    //anggota pinjam buku

    public function borrowbook(Request $request,$member_id,$book_id)
    {
        $member = Member :: find($member_id);
        $book = Book :: find($book_id);

        // cek telat
        if($member->penalty_until && $member->penalty_until > now()){
            return response()->json([
                'message'=>'anda sedang dalam masa penalti'
            ],403);
        }

        // cek apakah buku sudah di pinjam
        if($book->borrowed_by){
            return response()->json([
               'message'=>'buku sudah dipinjam'
            ],403);
        }

        // proses peminjaman buku

        $member->borrows()->create([
            'book_id'=>$book->id,
            'borrowed_at'=>now(),
            'return_due'=>now()->addDays(7),
        ]);

        // update status buku
        $book->borrowed_by= $member->id;
        $book->save();
        return response()->json([
           'message'=>'berhasil meminjam buku'
        ],200);
    }

    // anggpta mengembalikan buku

    public function returnBook(Request $request,$member_id,$book_id)
    {
        $member = Member :: find($member_id);
        $book = Book :: find($book_id);


        // cek apakah buku ini sudah di pinjam oleh anggota tersebut 
        $borrow = $member->borrows()->where('book_id',$book_id)->first();
        if(!$borrow){
            return response()->json([
               'message'=>'buku yang anda kembalikan bukan yang anda pinjam'
            ],403);
        }

        // cek apakah buku dikembalikan terlambat

        if($borrow->retrun_due < now())
        {
            $member->penalty_until = now()->addDays(3);//penalti 3 hari
            $member->save();
        }

        // mengembalikan buku
        $book->borrowed_by = null ;
        $book->save();

        // hapus peminjaman
        $borrow->delete();

        return response()->json([
           'message'=>'berhasil mengembalikan buku'
        ],200);
    }

}
