<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    public function index()
    {
        $books = DB::table('tbl_book')->join('tbl_author', 'tbl_book.author_id', '=', 'tbl_author.id')
        ->join('tbl_category', 'tbl_book.category_id', '=', 'tbl_category.id')
        ->select('tbl_book.id as id', 'tbl_book.name as name', 'tbl_book.image as image', 'tbl_book.price as price', 'tbl_author.name as author_name', 'tbl_category.name as category_name', 'tbl_book.quantity as quantity')
        ->get();

        session()->put('active', 'book');
        
        return view('admin.list_book', compact('books'));
    }

    public function create()
    {
        $categories = DB::table('tbl_category')->where('status', 1)->get();

        $authors = DB::table('tbl_author')->get();

        session()->put('active', 'book');

        return view('admin.add_book', ['title' => 'ADD BOOK'], compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'book_name' => 'required|unique:tbl_book|max:255',
        // ]);

        $name = $request->book_name;
        $author_id = $request->author_id;
        $category_id = $request->category_id;
        $quantity = $request->quantity;
        $price = $request->price;
        $image = $request->file('image');
        $image_name = time().'.'.$image->extension();
        $path = $image->storeAs('images', $image_name, 'public');
        
        DB::table('tbl_book')->insert([
            'name' => $name,
            'author_id' => $author_id,
            'category_id' => $category_id,
            'quantity' => $quantity,
            'price' => $price,
            'image' => $image_name,
        ]);
        
        session()->put('message', 'Book Added Successfully');
        return redirect('admin/list_book');
    }

    public function search(Request $request)
    {
        $name = $request->book_name;
        $books = DB::table('tbl_book')->join('tbl_author', 'tbl_book.author_id', '=', 'tbl_author.id')
        ->join('tbl_category', 'tbl_book.category_id', '=', 'tbl_category.id')
        ->where('tbl_book.name', 'like', '%'.$name.'%')
        ->select('tbl_book.id as id', 'tbl_book.name as name', 'tbl_book.image as image', 'tbl_book.price as price', 'tbl_author.name as author_name', 'tbl_category.name as category_name',' tbl_book.quantity as quantity')
        ->get();
        return view('admin.list_book', compact('books'));
    }

    public function edit($id)
    {
        $book = DB::table('tbl_book')->where('id', $id)->first();

        $categories = DB::table('tbl_category')->where('status', 1)->get();

        $authors = DB::table('tbl_author')->get();

        return view('admin.add_book', ['title' => 'EDIT BOOK', 'id' => $id], compact('book', 'categories', 'authors'));
    }
    
    public function update(Request $request)
    {
        $name = $request->book_name;
        $author_id = $request->author_id;
        $category_id = $request->category_id;
        $quantity = $request->quantity;
        $price = $request->price;

        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->extension();
            $path = $image->storeAs('images', $image_name, 'public');
            DB::table('tbl_book')->where('id', $request->id)->update([
                'image' => $image_name,
            ]);
        }
        
        DB::table('tbl_book')->where('id', $request->id)->update([
            'name' => $name,
            'author_id' => $author_id,
            'category_id' => $category_id,
            'quantity' => $quantity,
            'price' => $price,
        ]);
        
        session()->put('message', 'Book Updated Successfully');
        return redirect('admin/list_book');
    }

    public function delete($id)
    {
        DB::table('tbl_book')->where('id', $id)->delete();
        session()->put('message', 'Book Deleted Successfully');
        return redirect('admin/list_book');
    }
}
