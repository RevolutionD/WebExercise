<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('tbl_category')->get();
        return view('admin.list_category', compact('categories'));
    }

    public function create()
    {
        return view('admin.add_category', ['title' => 'ADD CATEGORY']);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'category_name' => 'required|unique:tbl_category|max:255',
        // ]);

        $name = $request->category;
        $status = $request->status;
        DB::table('tbl_category')->insert(['name' => $name, 'status' => $status]);
        session()->put('message', 'Category Added Successfully');
        return redirect('admin/list_category');
    }

    public function search(Request $request)
    {
        $name = $request->category_name;
        $categories = DB::table('tbl_category')->where('name', 'like', '%'.$name.'%')->get();
        return view('admin.list_category', compact('categories'));
    }

    public function edit($id)
    {
        $category = DB::table('tbl_category')->where('id', $id)->first();
        return view('admin.add_category', compact('category') , ['title' => 'UPDATE CATEGORY', 'id' => $id]);
    }
    
    public function update(Request $request)
    {
        $name = $request->category;
        $status = $request->status;

        DB::table('tbl_category')->where('id', $request->id)->update(['name' => $name, 'status' => $status]);
        
        session()->put('message', 'Category Updated Successfully');
        return redirect('admin/list_category');
    }
    
    public function delete($id)
    {
        DB::table('tbl_category')->where('id', $id)->delete();
        session()->put('message', 'Category Deleted Successfully');
        return redirect('admin/list_category');
    }
}
