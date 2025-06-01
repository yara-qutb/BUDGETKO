<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\App;

class CommentController extends Controller
{
    public function addComment(Request $request, $postId)
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->back()->withErrors('You need to be logged in to add a comment.');
        }

        $fullName = Auth::user()->name;
        $userName = explode(' ', $fullName)[0];

        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->user_id = auth()->id();
        $comment->user_name = $userName; // Use the first part of the name
        $comment->post_id = $postId;
        $comment->save();

        // Retrieve the post
        $post = Post::findOrFail($postId);

        // Check if post owner exists
        $postOwner = $post->user;
        if (!$postOwner) {
            return redirect()->back()->withErrors('Post owner does not exist.');
        }

        // Notify the post owner
        try {
            $postOwner->notify(new CommentNotification($comment, $post));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Notification could not be sent: ' . $e->getMessage());
        }
        $locale = App::getLocale();
        if ($locale == 'ar') {
            return redirect()->back()->with(['success' => 'تم اضافة تعليقك بنجاح', 'userName' => $userName]);
        }else{
            return redirect()->back()->with(['success' => 'Comment added successfully!', 'userName' => $userName]);
        }
    }

    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        $comments = Comment::where('post_id', $id)->with('user')->get();

        // Ensure user is authenticated
        if (!Auth::check()) {
            return view('user.reviews', compact('post', 'comments'))->with('You need to be logged in to view user details.');
        }

        $fullName = Auth::user()->name;
        $userName = explode(' ', $fullName)[0];

        return view('user.reviews', compact('post', 'comments', 'userName'));
    }
}
