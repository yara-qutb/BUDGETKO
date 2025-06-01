<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create() {
        $fullName = Auth::user()->name;
        $userName = explode(' ', $fullName)[0];
        $posts = Post::with('user')->latest()->get();
        return view('user.community', compact('posts'), ['userName' => $userName]);
    }

    public function store(Request $request) {
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;

        $data = $request->validate([
            'post' => 'required|string|max:255',
            'image' => 'image|mimetypes:image/jpeg,image/png,image/jpg|nullable'
        ]);

        $data['user_id'] = $user_id;
        $data['user_name'] = $user_name;

        if ($request->hasFile('image')) {
            // $data['image'] = Storage::putFile("posts",$data['image']);
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($data);

        $locale = App::getLocale();
        $message = ($locale == 'ar') ? 'تم عمل المنشور بنجاح' : 'You created the post successfully';

        return redirect(url('/community'))->with('success', $message);
    }


    public function showMyPosts($id) {
        if (Auth::id() != $id) {
            abort(403, 'Unauthorized action.');
        }
        $user = User::with(['posts' => function ($query) {
            $query->latest();
        }])->findOrFail($id);
        $fullName = Auth::user()->name;
        $userName = explode(' ', $fullName)[0];

        return view('user.myposts', ['posts' => $user->posts, 'userName' => $userName]);
    }

    public function deletePost(Request $request, $id) {
        $post = Post::findOrFail($id);

        if ($post->image && Storage::exists('public/' . $post->image)) {
            Storage::delete('public/' . $post->image);
        }
        $post->delete();

        $locale = App::getLocale();
        $message = ($locale == 'ar') ? 'تم حذف المنشور بنجاح' : 'Post deleted successfully';

        return redirect()->back()->with('success', $message);
    }

    public function deleteAllPosts(Request $request) {
        $user = Auth::user();
    
        // Retrieve all posts belonging to the authenticated user
        $posts = Post::where('user_id', $user->id)->get();
    
        foreach ($posts as $post) {
            // Check if the post has an image and delete the image if it exists
            if ($post->image && Storage::exists('public/' . $post->image)) {
                Storage::delete('public/' . $post->image);
            }
            // Delete the post
            $post->delete();
        }
    
        // Determine the locale and set the appropriate success message
        $locale = App::getLocale();
        $message = ($locale == 'ar') ? 'تم حذف جميع منشوراتك بنجاح' : 'All your posts deleted successfully';
    
        // Redirect back with a success message
        return redirect()->back()->with('success', $message);
    }
    
}



