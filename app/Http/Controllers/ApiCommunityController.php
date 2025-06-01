<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApiCommunityController extends Controller
{
    //all posts
    public function allPosts(){
        $posts = Post::all();
        return PostResource::collection($posts);
    }
    //show post
    public function showPost($id){
        $post = Post::find($id);
        if($post == null){
            return response()->json([
                "error" => "Post not found"
            ],404);
        }else{
            return new PostResource($post);
        }
    }
    //create post
    public function createPost(Request $request){

        $validator = Validator::make($request->all(), [
            'post' => 'required|string|max:255',
            'image' => 'image|mimetypes:image/jpeg,image/png,image/jpg|nullable'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                "error" => $validator->errors()
            ], 400);
        }
    
        $access_token = $request->header("access_token");
        $user = User::where("access_token", $access_token)->first();
    
        if ($user) {
            $user_id = $user->id;
            // $user_name= Auth::user()->name;
            $user_name = $user->name;
            $imagePath = null;
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('posts');
            }
    
            $post = Post::create([
                "post" => $request->post,
                "image" => $imagePath,
                "user_id" => $user_id,
                "user_name" => $user_name
            ]);
    
            if ($post) {
                return response()->json([
                    "msg" => "Post created successfully",
                    "post"=> new PostResource($post)
                ], 201);
            } else {
                return response()->json([
                    "error" => "Failed to create post"
                ], 500);
            }
        } else {
            return response()->json([
                "error" => "Invalid access token"
            ], 401);
        }
    }
    //update post
    public function updatePost(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'post' => 'required|string|max:255',
            'image' => 'image|mimetypes:image/jpeg,image/png,image/jpg|nullable'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                "error" => $validator->errors()
            ], 400);
        }
        $post = Post::find($id);
        if($post == null){
            return response()->json([
                "error" => "Post not found"
            ],404);
        }else{
            //storage
            if ($request->hasFile("image")) {
                $imagePath = $request->file('image')->store('posts');
                if ($post->image) {
                    Storage::delete($post->image);
                }
                $post->update([
                    "image" => $imagePath,
                ]);
            }
    
            // Update other fields
            $post->update([
                "post" => $request->post,
            ]);

            //msg
            return response()->json([
                "msg"=>"Post updated successfully",
                "post"=> new PostResource($post)
            ],201);
        }

    }
    //delet post
    public function deletePost(Request $request, $id){
        $post = Post::find($id);
        if($post == null){
            return response()->json([
                "error" => "Post not found"
            ],404);
        }else{
            if($request->hasFile("image")){
                Storage::delete($post->image);
            }
            //delete
            $post->delete();   
            //msg   
            return response()->json([
                "msg" => "Post deleted"
            ], 201);
            
        }
    }
    //all comments
    public function allComments(){
        $comments = Comment::all();
        return CommentResource::collection($comments);
    }
    //show comment
    public function showComment($id){
        $comment = Comment::find($id);
        if($comment == null){
            return response()->json([
                "error" => "Comment not found"
            ],404);
        }else{
            return new CommentResource($comment);
        }
    }
    //create comment
    public function createComment(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "error" => $validator->errors()
            ], 400);
        }

        $access_token = $request->header("access_token");
        $user = User::where("access_token", $access_token)->first();

        if ($user) {
            $user_id = Auth::id();
            $user_name = Auth::user()->name;

            $comment = Comment::create([
                "comment" => $request->comment,
                "user_id" => auth()->id(),
                "user_name" => Auth::user()->name,
                "post_id" => $id
            ]);

            if ($comment) {
                return response()->json([
                    "msg" => "comment created successfully",
                    "comment"=> new CommentResource($comment)

                ], 201);
            } else {
                return response()->json([
                    "error" => "Failed to create comment"
                ], 500);
            }
        } else {
            return response()->json([
                "error" => "Invalid access token"
            ], 401);
        }
    }

    //update comment
    public function updateComment(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|max:255',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                "error" => $validator->errors()
            ], 400);
        }
        $comment = Comment::find($id);
        if($comment == null){
            return response()->json([
                "error" => "Comment not found"
            ],404);
        }else{
            //storage
            $comment->update([
                "comment" => $request->comment,
            ]);

            //msg
            return response()->json([
                "msg"=>"Comment updated successfully",
                "comment"=> new CommentResource($comment)
            ],201);
        }

    }
    //delet comment
    public function deleteComment(Request $request, $id){
        $comment = Comment::find($id);
        if($comment == null){
            return response()->json([
                "error" => "comment not found"
            ],404);
        }else{
            //delete
            $comment->delete();   
            //msg   
            return response()->json([
                "msg" => "comment deleted"
            ], 201);
            
        }
    }
}
