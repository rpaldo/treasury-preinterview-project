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
                    <h3><a href="/users"><</a> Create New User</h3>
                    <form method="POST" action="/users/save">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class="form-label">Name</label>
                                    <div class="input-group input-group-outline is-filled">
                                        <input class="form-control" type="text" name="name" value="{{old('name')}}">
                                    </div>
                                    @error('name')
                                    <p class="error text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Username</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="username" value="{{old('username')}}">
                                </div>
                                @error('username')
                                <p class="error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Email</label>
                                <div class="input-group input-group-outline">
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                </div>
                                @error('email')
                                <p class="error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Role</label>
                                <div class="input-group input-group-outline">
                                    <select class="form-select" name="role">
                                        <option value="">-- Select --</option>
                                        @foreach($roles as $role)
                                            <option
                                                value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : ''}}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('role')
                                <p class="error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="password" value="{{old('password')}}">
                                </div>
                                @error('password')
                                <p class="error text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button name="action" value="save" type="submit" class="btn bg-gradient-dark w-100">
                                    CREATE
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
