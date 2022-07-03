<x-layout>
    <section>
        <div class="container py-4">
            <article class="col-lg-10 mx-auto d-flex justify-content-center flex-column w-sm-60">
                <h3><a href="/blogs">< </a>{{$post->title}}</h3>
                <h6>by </h6>
                <h6>{{$post->excerpt}}</h6>
                <p>
                    {{ $post->content }}
                </p>
            </article>
        </div>
        </div>
    </section>
</x-layout>
