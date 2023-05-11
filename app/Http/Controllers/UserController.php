<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {        
        // select total book from tbl_book
        $books = DB::table('tbl_book')->count();

        // select total book not return from tbl_issue_details
        $total_not_returns = DB::table('tbl_issue_details')->where('user_id', '=', session('user_id'))->where('return_date', '=', null)->count();

        // select total issued book from tbl_issue_details
        $total_issued_books = DB::table('tbl_issue_details')->where('user_id', '=', session('user_id'))->count();

        return view('user.user_home', compact('books', 'total_not_returns', 'total_issued_books'));
    }

    public function issuedBook()
    {
        $issued_books = DB::table('tbl_issue_details')->join('tbl_book', 'tbl_issue_details.book_id', '=', 'tbl_book.id')->where('tbl_issue_details.user_id', '=', session('user_id'))->select('tbl_issue_details.*', 'tbl_book.name')->get();

        return view('user.issued_book', compact('issued_books'));
    }

    public function searchIssuedBook(Request $request)
    {
        $name = $request->book_name;
        $issued_books = DB::table('tbl_issue_details')->join('tbl_book', 'tbl_issue_details.book_id', '=', 'tbl_book.id')->where('tbl_issue_details.user_id', '=', session('user_id'))->where('tbl_book.name', 'like', '%'.$name.'%')->select('tbl_issue_details.*', 'tbl_book.name')->get();

        return view('user.issued_book', compact('issued_books'));
    }

    public function profile()
    {
        $user = DB::table('tbl_user')->where('id', '=', session('user_id'))->first();

        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        DB::table('tbl_user')->where('id', '=', session('user_id'))->update([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
        ]);
        session()->put('message', 'Profile updated successfully.');
        return redirect('/user/profile');
    }

    public function changePassword()
    {
        return view('user.change_password');
    }

    public function updatePassword(Request $request)
    {
        $old_password = md5($request->old_password);
        $new_password = md5($request->new_password);
        $confirm_password = md5($request->confirm_password);

        $user = DB::table('tbl_user')
        ->join('tbl_account', 'tbl_user.account_id', '=', 'tbl_account.id')
        ->where('tbl_user.id', '=', session('user_id'))->select('password', 'tbl_account.id as id')->first();

        if ($user->password == $old_password) {
            if ($new_password == $confirm_password) {
                DB::table('tbl_account')->where('id', '=', $user->id)->update([
                    'password' => $new_password,
                ]);
                session()->put('message', 'Password updated successfully.');
                return redirect('/user/change_password');
            } else {
                session()->put('message', 'New password and confirm password not match.');
                return redirect('/user/change_password');
            }
        } else {
            session()->put('message', 'Old password not match');
            return redirect('/user/change_password');
        }
    }

    public function search(Request $request)
    {
        $name = $request->user_name;
        $users = DB::table('tbl_user')->where('full_name', 'like', '%'.$name.'%')->get();
        return view('admin.list_user', compact('users'));
    }

    public function getListUser()
    {
        $users = DB::table('tbl_user')
        ->join('tbl_account', 'tbl_user.account_id', '=', 'tbl_account.id')
        ->select('tbl_user.*', 'tbl_account.username')
        ->get();
        return view('admin.list_user', compact('users'));
    }

    public function userIssueHistory($id)
    {
        $user_id = $id;

        $issued_books = DB::table('tbl_issue_details')
        ->join('tbl_book', 'tbl_issue_details.book_id', '=', 'tbl_book.id')
        ->join('tbl_user', 'tbl_issue_details.user_id', '=', 'tbl_user.id')
        ->where('tbl_issue_details.user_id', '=', $user_id)
        ->select('tbl_issue_details.*', 'tbl_book.name', 'tbl_user.full_name', 'tbl_user.student_id')->get();

        return view('admin.user_issued_history', compact('issued_books'), compact('user_id'));
    }

    public function searchIssueHistory(Request $request, $id)
    {
        $user_id = $id;
        $name = $request->book_name;
        $issued_books = DB::table('tbl_issue_details')
        ->join('tbl_book', 'tbl_issue_details.book_id', '=', 'tbl_book.id')
        ->join('tbl_user', 'tbl_issue_details.user_id', '=', 'tbl_user.id')
        ->where('tbl_issue_details.user_id', '=', $user_id)
        ->where('tbl_book.name', 'like', '%'.$name.'%')
        ->select('tbl_issue_details.*', 'tbl_book.name', 'tbl_user.full_name', 'tbl_user.student_id')->get();

        return view('admin.user_issued_history', compact('issued_books'), compact('user_id'));
    }

    public function listBook()
    {
        $books = DB::table('tbl_book')->join('tbl_author', 'tbl_book.author_id', '=', 'tbl_author.id')
        ->join('tbl_category', 'tbl_book.category_id', '=', 'tbl_category.id')
        ->select('tbl_book.id as id', 'tbl_book.name as name', 'tbl_book.image as image', 'tbl_book.price as price', 'tbl_author.name as author_name', 'tbl_category.name as category_name', 'tbl_book.quantity as quantity')
        ->get();
        return view('user.list_book', compact('books'));
    }

    public function searchBook(Request $request)
    {
        $name = $request->book_name;
        $books = DB::table('tbl_book')->join('tbl_author', 'tbl_book.author_id', '=', 'tbl_author.id')
        ->join('tbl_category', 'tbl_book.category_id', '=', 'tbl_category.id')
        ->where('tbl_book.name', 'like', '%'.$name.'%')
        ->select('tbl_book.id as id', 'tbl_book.name as name', 'tbl_book.image as image', 'tbl_book.price as price', 'tbl_author.name as author_name', 'tbl_category.name as category_name', 'tbl_book.quantity as quantity')
        ->get();
        return view('user.list_book', compact('books'));
    }
}
