<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class IssuedBookController extends Controller
{
    public function index()
    {
        $issues = DB::table('tbl_issue_details')
        ->join('tbl_book', 'tbl_issue_details.book_id', '=', 'tbl_book.id')
        ->join('tbl_user', 'tbl_issue_details.user_id', '=', 'tbl_user.id')
        ->select('tbl_issue_details.*', 'tbl_book.name as book_name', 'tbl_user.full_name as full_name')
        ->get();

        session()->put('active', 'issue');

        return view('admin.list_issue', compact('issues'));
    }

    public function create()
    {
        session()->put('active', 'issue');

        return view('admin.add_issue', ['title' => 'ADD issue']);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'issue_name' => 'required|unique:tbl_issue_details|max:255',
        // ]);

        $user_id = $request->user_id;
        // book_id is an array
        $book_id = $request->book_id;
        $due_date = date('Y-m-d H:i:s', strtotime('+7 days'));

        foreach($book_id as $key => $value) {
            $data = array(
                'user_id' => $user_id,
                'book_id' => $value,
                'due_date' => $due_date,
            );
            DB::table('tbl_issue_details')->insert($data);
        }

        foreach($book_id as $key => $value) {
            DB::table('tbl_book')
            ->where('id', $value)
            ->decrement('quantity', 1);
        }

        session()->put('message', 'Issue created successfully!');

        return redirect('admin/list_issue');
    }

    public function search(Request $request)
    {
        $name = $request->issue_name;
        $issues = DB::table('tbl_issue_details')
        ->join('tbl_book', 'tbl_issue_details.book_id', '=', 'tbl_book.id')
        ->join('tbl_user', 'tbl_issue_details.user_id', '=', 'tbl_user.id')
        ->where('tbl_book.name', 'like', '%' . $name . '%')
        ->orWhere('tbl_user.full_name', 'like', '%' . $name . '%')
        ->select('tbl_issue_details.*', 'tbl_book.name as book_name', 'tbl_user.full_name as full_name')
        ->get();
        return view('admin.list_issue', compact('issues'));
    }

    public function searchUser($key)
    {
        
        if($key != '') {
            $output = '';
            $users = DB::table('tbl_user')
            ->where('full_name', 'like', '%' . $key . '%')
            ->orWhere('id', 'like', '%' . $key . '%')
            ->get();

            if(count($users) > 0) {
                $output .= '<table class="table table-striped table-bordered table-responsive">'
                            . '<thead class="table-dark">'
                            . '<tr>'
                            . '<th>Id</th>'
                            . '<th>Name</th>'
                            . '<th>Student ID</th>'
                            . '<th>Email</th>'
                            . '<th>Phone</th>'
                            . '<th>Status</th>'
                            . '<th>Action</th>'
                            . '</tr>'
                            . '</thead>'
                            . '<tbody>';
                foreach($users as $key => $user) {
                    $output .= '<tr>
                    <td>' . $user->id . '</td>
                    <td>' . $user->full_name . '</td>
                    <td>' . $user->student_id . '</td>
                    <td>' . $user->email . '</td>
                    <td>' . $user->phone . '</td>
                    <td>' . 
                        ($user->status == 1  ? '<div><span class="badge bg-success">Active</span></div>' : '<div><span class="badge bg-danger">Inactive</span></div>')
                    . '</td>
                    <td>
                    <input type="radio" name="user_id" value="' . $user->id . '" ' . ($user->status == 0 ? 'disabled' : '') . '>
                    </td>
                    </tr>';
                }
                
                $output .= '</tbody></table>';
            }
            else {
                $output = "<div class='alert alert-danger'>No user found</div>";
            }
        }
        return response($output);        
    }

    public function searchBook($key)
    {
        
        if($key != '') {
            $output = '';
            $books = DB::table('tbl_book')
            ->where('name', 'like', '%' . $key . '%')
            ->get();

            if(count($books) > 0) {
                $output .= '<table class="table table-striped table-bordered table-responsive">'
                            . '<thead class="table-dark">'
                            . '<tr>'
                            . '<th>Id</th>'
                            . '<th>Name</th>'
                            . '<th>Image</th>'
                            . '<th>Quantity</th>'
                            . '<th>Action</th>'
                            . '</tr>'
                            . '</thead>'
                            . '<tbody>';
                foreach($books as $key => $book) {
                    $output .= '<tr>
                    <td>' . $book->id . '</td>
                    <td>' . $book->name . '</td>
                    <td>' . 
                        '<img src="' . asset('storage/images/' . $book->image) . '" alt="' . $book->name . '" width="100px" height="100px">'
                    . '</td>
                    <td>' . 
                        ($book->quantity > 0  ?  $book->quantity : 'Out of stock')
                    . '</td>
                    <td>
                        <input type="checkbox" name="book_id[]" value="' . $book->id . '" ' . ($book->quantity == 0 ? 'disabled' : '') . '>
                    </td>
                    </tr>';
                }
                // <td>' . 
                //     ($book->status == 1  ? '<div><span class="badge bg-success">Active</span></div>' : '<div><span class="badge bg-danger">Inactive</span></div>')
                // . '</td>
                
                $output .= '</tbody></table>';
            }
            else {
                $output = "<div class='alert alert-danger'>No book found</div>";
            }
        }
        return response($output);        
    }

    // public function edit($id)
    // {
    //     $issue = DB::table('tbl_issue_details')->where('id', $id)->first();
    //     return view('admin.add_issue', compact('issue') , ['title' => 'UPDATE issue', 'id' => $id]);
    // }
    
    // public function update(Request $request)
    // {
    //     $name = $request->issue;
    //     $status = $request->status;

    //     DB::table('tbl_issue_details')->where('id', $request->id)->update(['name' => $name, 'status' => $status]);
        
    //     session()->put('message', 'issue Updated Successfully');
    //     return redirect('admin/list_issue');
    // }
    
    // public function delete($id)
    // {
    //     DB::table('tbl_issue_details')->where('id', $id)->delete();
    //     session()->put('message', 'issue Deleted Successfully');
    //     return redirect('admin/list_issue');
    // }
}
