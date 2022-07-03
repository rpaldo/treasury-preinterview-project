<x-layout>
    <section>
        <div class="container py-4">
            <div class="row">
                @if( $errors->has('save'))
                    <div class="container alert-danger mt-3 text-danger rounded w-45">
                        <p class="text-white text-sm-center py-sm-1">{{ $errors->first('save') }}</p>
                    </div>
                @endif
                <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
                    <h3><a href="/posts"><</a> Create New Post</h3>
                    <form method="POST" action="/posts/save">
                        @csrf
                        <input type="hidden" name="author_id" value="{{auth()->user()->id}}"/>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <div class="input-group input-group-outline is-filled">
                                        <input class="form-control" type="text" name="title" value="{{old('title')}}">
                                    </div>
                                    @error('title')
                                    <p class="error text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Slug</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="slug" value="{{old('slug')}}">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Excerpt</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="excerpt" value="{{old('excerpt')}}">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Content</label>
                                <div class="input-group input-group-outline">
                                    <textarea name="content"
                                              class="form-control textarea-border rounded-3"
                                              rows="10">{{old('content')}}</textarea>
                                </div>
                                @error('content')
                                <p class="error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button name="action" value="save" type="submit" class="btn bg-gradient-dark w-100">
                                        SAVE
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button name="action" value="publish" type="submit"
                                            class="btn bg-gradient-dark w-100">PUBLISH
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
