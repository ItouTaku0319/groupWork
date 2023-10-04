<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
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

    public function reviewList(Request $request)
    {
        $data = [
            'userInfo' => Auth::id(),
            'bookInfo' => book::find($request->id),
        ];
    
        if ($request->has('show_my_reviews')) {
            // 自分のレビューのみを取得
            $data['reviews'] = review::where('bookId', $request->id)->where('usersId', Auth::id())->get();
        } else {
            // 全てのレビューを取得
            $data['reviews'] = review::where('bookId', $request->id)->get();
        }
    
        return view('reviewListShow', $data);
        // $data = [
        //     'userInfo' => Auth::id(),
        //     'bookInfo' => book::find($request->id),
        //     'reviews' => review::where('bookId',$request->id)->get()
        // ];
        // return view('reviewListShow',$data);
    }

}
