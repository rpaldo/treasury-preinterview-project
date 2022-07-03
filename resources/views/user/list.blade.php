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
                    <h3 class="w-30">User List</h3>
                    <span class="text-center w-35 text-xs btn btn-link"
                          style="position:relative; margin-top: -2rem; margin-bottom: 1rem"><a
                            href="/users/new">Create New User</a></span>
                    <table class="table-bordered table-striped">
                        <thead class="text-center">
                        <th style="width: 10%">Name</th>
                        <th style="width: 10%">Username</th>
                        <th style="width: 20%">Email</th>
                        <th style="width: 15%">Role</th>
                        <th style="width: 5%">Action</th>
                        </thead>
                        <tbody class="ps-1">
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>
                                    <span class="m-1"><a href="/users/{{$user->id}}"
                                                         class="btn btn-link">Edit</a></span>
                                    <form method="post" action="/users/{{$user->id}}">
                                        @csrf
                                        @method('delete')
                                        <span class="m-1"><button type="submit"
                                                                  class="btn btn-link">Delete</button></span>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-layout>
