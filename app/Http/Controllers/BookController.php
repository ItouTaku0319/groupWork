<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //書籍登録画面へ遷移
    public function showbookRegister()
    {
        return view('bookRegister');
    }

    //書籍新規登録メソッド
    public function bookRegister(Request $request )
    {
        $input = $request->validate([
            'ISBN' => 'required | string',
            'bookname' => 'required | string',
            'author' => 'required | string'
        ]);

        $book = Book::query()->create([
            'ISBN' => $request['ISBN'],
            'bookname'=>$request['bookname'],
            'author' => $request['author'],
        ]);
        return view('bookStore',$book);
        //return redirect()->route('');
    }

    //detaに全てのデータを入れ書籍一覧表示へ遷移
    public function bookIndex()
    {
        //
        $data = [
            'records' => book::all()
        ];
        return view ('/books/index',$data);
    }

    //書籍削除画面へ遷移
    public function showbookErase(Request $request)
    {
        //get通信の場合
        if($request->isMethod('get')){
            return view ('bookErase');
        }elseif($request->isMethod('post')){
            $id=$request->id;
            $data = [
                //入力されたid値のデータを取得
                'record' => book::find($id)
            ];
            return view('bookErase',$data);
        }else{
            redirect('/');
        }
        
    }

    //削除用アクションメソッドの定義
    public function bookErase(Request $request)
    {
        return view('bookDelete');
    }


    public function bookDelete(Request $request)
    {
        //削除対象のレコードをフォームからのid値をもとにモデルに取り出す
        $book = Book::find($request->id);
        //データを削除するメソッドを実行
        $book->delete();
        $data = [
            'id' => $request->id,
            'ISBN' => $request->ISBN,
            'bookName' => $request->bookName,
            'author' => $request->author,
        ];
        return view('bookDelete',$data);
    }

    public function bookRecommend(Request $request)
    {
        $book = Book::find($request->id);
        $data = [
            'record' => book::find($request->id)
        ];
        return view('bookRecommend',$data);
    }
}
