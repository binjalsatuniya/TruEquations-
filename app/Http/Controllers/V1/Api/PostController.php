<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Reel;
use App\Models\Comment;

class PostController extends Controller
{
    public function new_updates(Request $request)
    {

        $posts = Post::where('status', true)
                ->with(['comments' => function ($query) {
                    $query->orderBy('created_at', 'desc')->take(5);
                }])
                ->withCount(['comments' => function ($query) {
                    $query->selectRaw('COUNT(*)');
                }])
                ->whereHas('comments')
                ->latest()
                ->get();

        $contents = collect();
        $contents = $contents->concat($posts);

        $responseData = [
            'data' => $contents,
            'message' => 'Content fetched successfully.',
        ];

        return response()->json($responseData, Response::HTTP_OK);
        // write  query to fetch any type of  latest content  that can be post , feeds or reels, which has  true status
         // has to return counts of comments 
         // has to return 5 comments per content 
         // all that has to be in single query, 
         // return laravel standard response format with http status code standerd status code
    }
    public function  comments(Request $request, $id){
        // request should send  one   of  tye type of content {post, feed , reels}
        // fetch active comments on that content and send in pagination, 
        $content_type = $id;
        if ($content_type === 'post') {
            $contentModel = Post::class;
        } elseif ($content_type === 'feed') {
            $contentModel = Feed::class;
        } elseif ($content_type === 'reel') {
            $contentModel = Reel::class;
        } else {
            // Invalid content type, return an error response
            $responseData = [
                'message' => 'Invalid content type provided.',
            ];

            return response()->json($responseData, Response::HTTP_BAD_REQUEST);
        }

        $comments = Comment::where('commentable_type', $contentModel)
                            ->where('status', true)
                            ->paginate(10);
    
        $responseData = [
                'data' => $comments,
                'message' => 'Active comments fetched successfully.',
        ];

        return response()->json($responseData, Response::HTTP_OK);
    }
}
