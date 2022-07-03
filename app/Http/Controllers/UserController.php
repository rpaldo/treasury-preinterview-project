<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    // Display user list
    public function index()
    {
        return view('user.list', array(
            'users' => $this->service->all()
        ));

    }

    // Save registered user
    public function register()
    {
        // Validate request
        $validationRules = User::DEFAULT_VALIDATION_RULES;
        $validationRules['username'][] = 'unique:users,username';
        $validationRules['email'][] = 'unique:users,email';
        $user = request()->validate($validationRules);

        $result = $this->service->create($user);

        if ($result) {
            return redirect('/login')->with('success', 'Registration completed. Please sign in to access your account.');
        }

        return back()->with('save', 'Registration cannot completed. Please try again later.');
    }

    // Display user creation page in admin
    public function create()
    {
        return view('user.create', array(
            'roles' => Role::all(),
        ));
    }

    // Display user update page in admin
    public function edit($id)
    {
        $user = $this->service->get($id);
        if (!$user) abort(404);
        
        return view('user.edit', array(
            'user' => $user,
            'roles' => Role::all(),
        ));
    }

    // Save created/update user
    public function save()
    {
        // Validate request
        $validationRules = User::DEFAULT_VALIDATION_RULES;
        $validationRules['role'] = array('required');

        $request = request()->all();
        if (isset($request['id']) && !$request['password']) { // If update and password is not set, no need to validate password
            unset($validationRules['password']);
        } else { // If create, add validation for unique username and email
            $validationRules['username'][] = 'unique:users,username';
            $validationRules['email'][] = 'unique:users,email';
        }

        request()->validate($validationRules);

        if (isset($request['id'])) {
            $result = $this->service->update($request);
        } else {
            $result = $this->service->create($request);
        }

        if ($result) {
            return redirect('/users')->with('success', 'User saved successfully.');
        }

        return back()->withErrors(['save' => 'Failed to save user. Please try again.']);
    }

    // Delete user. Redirect to list screen
    public function delete($id)
    {
        $this->service->delete($id);
        return redirect('/users');
    }
}
