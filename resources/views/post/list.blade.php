<x-layout>
    <section>
        <div class="container py-4">
            <div class="row">
                @if(session()->has('success'))
                    <div class="container alert-success mt-3 rounded w-60 mb-4">
                        <p class="text-white text-sm-center py-sm-1 m-1">{{ session('success') }}</p>
                    </div>
                @endif
                <div class="col-lg-10 mx-auto d-flex justify-content-center flex-column">
                    <h3 class="w-30">Post List</h3>
                    <span class="text-center w-35 text-xs btn btn-link"
                          style="position:relative; margin-top: -2rem; margin-bottom: 1rem"><a
                            href="/posts/new">Create New
                        Post</a></span>

                    <table class="table-bordered table-striped">
                        <thead class="text-center">
                        <th style="width: 10%">Title</th>
                        <th style="width: 10%">Slug</th>
                        <th style="width: 30%">Excerpt</th>
                        <th style="width: 30%">Content</th>
                        <th style="width: 15%">Date Published</th>
                        <th style="width: 5%">Action</th>
                        </thead>
                        @if( count($posts) > 0)
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->slug}}</td>
                                    <td>{{$post->excerpt}}</td>
                                    <td>{{substr($post->content, 0, 100)}}</td>
                                    <td>{{$post->published_at}}</td>
                                    <td>
                                    <span class="m-1"><a href="/posts/{{$post->id}}"
                                                         class="btn btn-link">Edit</a></span>
                                        <form method="post" action="/posts/{{$post->id}}">
                                            @csrf
                                            @method('delete')
                                            <span class="m-1"><button type="submit"
                                                                      class="btn btn-link">Delete</button></span>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @else
                            <tbody>
                            <tr>
                                <td colspan="6" class="text-center">No posts yet.</td>
                            </tr>
                            </tbody>
                        @endif
                    </table>
                    <div class="mt-3">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
