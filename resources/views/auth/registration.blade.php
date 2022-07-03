<x-layout>
    <div class="container mt-5">
        <div class="row">
            @if( $errors->has('save'))
                <div class="container alert-danger mt-3 text-danger rounded w-45">
                    <p class="text-white text-sm-center py-sm-1">{{ $errors->first('save') }}</p>
                </div>
            @endif
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Register</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="registration-form" method="POST" action="/register">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div
                                            class="input-group input-group-outline{{ old('name') ? ' is-filled' : '' }}">
                                            <label class="form-label">Name</label>
                                            <input
                                                class="form-control"
                                                type="text" name="name"
                                                value="{{old('name')}}">
                                        </div>
                                        @error('name')
                                        <p class="error text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div
                                            class="input-group input-group-outline{{ old('username') ? ' is-filled' : '' }}">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" placeholder="" name="username"
                                                   value="{{old('username')}}">
                                        </div>
                                        @error('username')
                                        <p class="error text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div
                                            class="input-group input-group-outline{{ old('email') ? ' is-filled' : '' }}">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="" name="email"
                                                   value="{{old('email')}}">
                                        </div>
                                        @error('email')
                                        <p class="error text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-4">
                                        <div class="input-group input-group-outline">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        @error('password')
                                        <p class="error text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn bg-gradient-dark w-100">Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
</x-layout>

