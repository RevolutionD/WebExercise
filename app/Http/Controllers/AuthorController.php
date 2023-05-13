<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuthorController extends Controller
{
    public function index()
    {
        $authors = DB::table('tbl_author')->get();

        session()->put('active', 'author');
        return view('admin.list_author', compact('authors'));
    }

    public function create()
    {
        session()->put('active', 'author');
        return view('admin.add_author', ['title' => 'ADD AUTHOR']);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'author_name' => 'required|unique:tbl_author|max:255',
        // ]);

        $name = $request->author;
        DB::table('tbl_author')->insert(['name' => $name]);
        session()->put('message', 'Author Added Successfully');
        return redirect('admin/list_author');
    }

    public function search(Request $request)
    {
        $name = $request->author_name;
        $authors = DB::table('tbl_author')->where('name', 'like', '%'.$name.'%')->get();
        return view('admin.list_author', compact('authors'));
    }

    public function edit($id)
    {
        $author = DB::table('tbl_author')->where('id', $id)->first();
        return view('admin.add_author', compact('author') , ['title' => 'UPDATE AUTHOR', 'id' => $id]);
    }
    
    public function update(Request $request)
    {
        $name = $request->author;

        DB::table('tbl_author')->where('id', $request->id)->update(['name' => $name]);
        
        session()->put('message', 'AUTHOR Updated Successfully');
        return redirect('admin/list_author');
    }

    public function delete($id)
    {
        DB::table('tbl_author')->where('id', $id)->delete();
        session()->put('message', 'Author Deleted Successfully');
        return redirect('admin/list_author');
    }
}
