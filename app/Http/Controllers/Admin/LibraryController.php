<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\Classes;

class LibraryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // book list view

    public function bookList()
    {
    	$books = Book::active();
    	return view('admin.library.books',compact('books'));
    }

    // store book
    public function bookStore(Request $request)
    {


    	$data = $request->validate([
            'title' => 'required',
            'book_no' => 'required',
            'isbn_no' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'subject' => 'required',
            'Rack_no' => 'required',
            'qty' => 'required',
            'book_price' => 'required',
            'description' => 'required',
        ]);
    	
    	Book::create($request->all());

    	 $notification = array(
            'messege' => 'Book Inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.book.index')->with($notification);
    }


    // edit bookStore
    public function bookEdit($id)
    {
    	$book =Book::findOrFail($id);

    	return response()->json($book);
    }

    // update book

    public function bookUpdate(Request $request)
    {

    		$data = $request->validate([
            'title' => 'required',
            'book_no' => 'required',
            'isbn_no' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'subject' => 'required',
            'Rack_no' => 'required',
            'qty' => 'required',
            'book_price' => 'required',
            'description' => 'required',
        ]);
    	
    	Book::findOrFail($request->id)->update($data);

    	$notification = array(
            'messege' => 'Book Updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.book.index')->with($notification);
    }

    // status change

    public function bookStatus($id)
    {
    	$statusChange = Book::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Book Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.book.index')->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Book Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.book.index')->with($notification);
        }
    }

    // book Delete

    public function bookDelete ($id)
    {
    	Book::findOrFail($id)->singleDelete();

    	  $notification = array(
                'messege' => 'Book Deleted successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.book.index')->with($notification);
    }

    // multi delete book

    public function bookMultiDelete(Request $request)
    {
    	if ($request->deleteId == NULL) {
            $notification = array(
                'messege' => 'You did not select any Book',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            
                Book::whereIn('id', $request->deleteId)->singleDelete();
            
        }
        $notification = array(
            'messege' => 'Books is deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // Library member list

    public function libraryList()
    {
        $classes = Classes::active();
        return view('admin.library.library_member',compact('classes'));
    }

    // library member insert

    public function libraryMemberStore(Request $request)
    {
        return $request;
    }
}
