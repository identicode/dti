<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }

    public function index()
    {
        
    	$comments = Comment::with('user')->orderBy('timestamp', 'desc')->get();

    	return view('admin.comment.list')
    			->with('comments', $comments);
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();

        return redirect()->back()->with('success', 'Comment has been deleted.');

    }
}
