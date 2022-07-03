<x-layout>
    @if(session()->has('success'))
        <div class="container alert-success mt-3 text-success rounded w-40">
            <p class="text-white text-sm-center py-sm-1">{{ session('success') }}</p>
        </div>
    @elseif( $errors->has('login'))
        <div class="container alert-danger mt-3 text-danger rounded w-45">
            <p class="text-white text-sm-center py-sm-1">{{ $errors->first('login') }}</p>
        </div>
    @endif
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="text-start" method="POST" action="/login">
                            @csrf
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign in
                                </button>
                            </div>
                            <p class="mt-4 text-sm text-center">
                                <a href="/register">Don't have an account?</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
