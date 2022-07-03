<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    // Display all published blogs to public
    public function index()
    {
        return view('guest.post.list', array(
            'posts' => $this->service->getPublishedPosts(true, 10)
        ));
    }

    // Display published blog details to public
    public function show($slug)
    {
        return view('guest.post.show', array(
            'post' => $this->service->get($slug, 'slug')
        ));
    }

    // Show list of blogs created by user
    public function list()
    {
        return view('post.list', array(
            'posts' => $this->service->getUserPosts(true, 10)
        ));
    }

    // Redirect user to blog post creation screen
    public function create()
    {
        return view('post.create');
    }

    // Save the created/updated blog post
    public function save()
    {
        $request = request()->all();

        $validationRules = array(
            'title' => array('required'),
            'author_id' => array('required', 'exists:users,id')
        );

        // If action is "Publish", add validation for required content and set the published datetime to current datetime
        if (isset($request['action']) && 'publish' == $request['action']) {
            $validationRules['content'] = array('required');
            $request['published_at'] = now();
        }

        request()->validate($validationRules);

        if (isset($request['id'])) {
            $result = $this->service->update($request);
        } else {
            $result = $this->service->create($request);
        }

        if ($result) {
            return redirect('/posts')->with('success', 'Post saved successfully.');
        }

        return back()->withErrors(['save' => 'Failed to save post. Please try again.']);
    }

    // Display edit screen of blog post
    public function edit($id)
    {
        $post = $this->service->getPost($id);
        if (!$post) abort(404);

        return view('post.edit', array(
            'post' => $post
        ));
    }

    // Delete a blog post with the specified ID
    public function delete($id)
    {
        $this->service->delete($id);
        return redirect('/posts');
    }
}
