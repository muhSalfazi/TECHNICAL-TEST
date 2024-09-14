<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    //


    public function index()
    {
        $members = Member::all();
        return response()->json($members);
    }

    // menampilkan detail
    public function show($id){
        $member = Member::find($id);
        if($member){
            return response()->json($member);
        }else{
            return response()->json(['message' => 'Member not found'], 404);
        }
    }

    public function memberStatus($id)
    {
        $member = Member::with('borrows.book')->findOrFail($id);


        return response()->json([
            'member'=>$member,
            'book_borrowd'=>$member->borrows->pluck('book.title')
        ]);
    }
}
