<?php

namespace App\Services;

use App\Models\Post;
use Log;

class PostService
{
    /**
     * Create new post
     *
     * @param $newPost
     * @return boolean
     */
    public function create($newPost)
    {
        $post = new Post();
        $post->title = strip_tags(addslashes($newPost['title']));
        $post->excerpt = strip_tags(addslashes($newPost['excerpt']));
        $post->content = addslashes($newPost['content']);
        $post->slug = addslashes($newPost['slug']);
        $post->author_id = $newPost['author_id'];

        if (isset($newPost['published_at'])) {
            $post->published_at = $newPost['published_at'];
        }

        if (!$post->slug) { // If slug is not specified, use title for the slug
            $post->slug = str_replace(' ', '-', strtolower($post->title));
        }

        return $post->save();
    }

    /**
     * Update post
     *
     * @param $updatedPost
     * @return boolean
     */
    public function update($updatedPost)
    {
        try {
            $post = Post::findOrFail($updatedPost['id']);
            $post->title = strip_tags(addslashes($updatedPost['title']));
            $post->excerpt = strip_tags(addslashes($updatedPost['excerpt']));
            $post->content = addslashes($updatedPost['content']);

            if (isset($updatedPost['published_at'])) {
                $post->published_at = $updatedPost['published_at'];
            }

            return $post->save();
        } catch (ModelNotFoundException $e) {
            Log::debug($e);
        }

        return false;
    }

    /**
     * Delete post
     *
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
    }

    /**
     * Retrieve post by the specified field
     *
     * @param $value
     * @param $field
     * @return null | Post
     */
    public function getPost($value, $field = 'id')
    {
        try {
            return Post::where($field, '=', $value)->first();
        } catch (ModelNotFoundException $e) {
            Log::debug($e);
        }

        return null;
    }

    /**
     * Retrieve published posts for public display
     *
     * @param $paginate
     * @param $countPerPage
     * @return mixed
     */
    public function getPublishedPosts($paginate = false, $countPerPage = 15)
    {
        $posts = Post::latest()->whereNotNull('published_at');
        if ($paginate) {
            $posts = $posts->paginate($countPerPage);
        } else {
            $posts = $posts->get();
        }

        return $posts;
    }

    /**
     * Retrieve posts created the logged-in user
     *
     * @param $paginate
     * @param $countPerPage
     * @return array
     */
    public function getUserPosts($paginate = false, $countPerPage = 15)
    {
        $posts = array();
        if (auth()->guest()) {
            return $posts;
        }

        $posts = Post::latest()->where('author_id', '=', auth()->user()->id);
        if ($paginate) {
            $posts = $posts->paginate($countPerPage);
        } else {
            $posts = $posts->get();
        }

        return $posts;
    }
}
