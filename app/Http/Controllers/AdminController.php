<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        // get total book quantity from tbl_book
        $books = DB::table('tbl_book')->sum('quantity');

        // get total user from tbl_user
        $users = DB::table('tbl_user')->count();

        // get total author from tbl_author
        $authors = DB::table('tbl_author')->count();

        // get total category from tbl_category
        $categories = DB::table('tbl_category')->count();

        // get total issue not return from tbl_issue_request
        $books_not_return = DB::table('tbl_issue_details')->where('return_date', '=', null)->count();

        session()->put('active', 'home');

        return view('admin.admin_home', compact('books', 'users', 'authors', 'categories', 'books_not_return'));
    }

    public function changePassword()
    {
        session()->put('active', 'change');
        return view('admin.change_password');
    }

    public function updatePassword(Request $request) {
        $old_password = md5($request->old_password);
        $new_password = md5($request->new_password);
        $confirm_password = md5($request->confirm_password);

        $user = DB::table('tbl_admin')->join('tbl_account', 'tbl_admin.account_id', '=', 'tbl_account.id')
        ->where('tbl_account.password', '=', $old_password)->first();

        if ($user) {
            if ($new_password == $confirm_password) {
                DB::table('tbl_account')->where('id', '=', $user->account_id)->update([
                    'password' => $new_password
                ]);
                session()->put('message', 'Password updated successfully.');
                return redirect('/admin/change_password');
            } else {
                session()->put('message', 'New password and confirm password does not match.');
                return redirect('/admin/change_password');
            }
        } else {
            session()->put('message', 'Old password does not match.');
            return redirect('/admin/change_password');
        }
    }
}
