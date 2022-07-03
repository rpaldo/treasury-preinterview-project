<x-layout>
    <section>
        <div class="container py-4">
            <div class="row mb-4">
                <h2>Blog List</h2>
            </div>
            <div class="row">
                @foreach( $posts as $post )
                    <article class="col-lg-10 mx-auto d-flex justify-content-center flex-column w-sm-40">
                        <h3><a href="/blogs/{{$post->slug}}">{{$post->title}}</a></h3>
                        <h6>by {{ $post->author->name}}</h6>
                        <h6>{{$post->excerpt}}</h6>
                        <p>
                            {{ substr($post->content, 0, 50) }}
                            @if( strlen( $post->content) > 50)
                                ... <a href="/blogs/{{$post->slug}}">Read more</a>
                            @endif
                        </p>
                    </article>
                @endforeach
            </div>
            {{ $posts->links() }}
        </div>
    </section>
</x-layout>
