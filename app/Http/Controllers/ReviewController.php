<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //

    public function reviewInsert(Request $request)
    {
        $data = [
            'record' => book::find($request->id)
        ];
        return view('reviewInsert',$data);
    }

    //コメント登録メソッド
    public function reviewShow(Request $request)
    {

        $review = Review::query()->create([
            'bookId' => $request['id'],
            'usersId' => Auth::id(),
            'recommend' => $request['recommend'],
            'comment'=>$request['comment'],
        ]);
        return view('reviewShow',$review);
        //return redirect()->route('');
    }

    public function reviewList()
    {
        $data = [
            'records' => book::all()
        ];
        return view('reviewListShow',$data);
    }
}
