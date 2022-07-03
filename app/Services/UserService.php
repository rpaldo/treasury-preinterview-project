<?php

namespace App\Services;

use App\Models\User;
use Log;

class UserService
{
    /**
     * Create new user (via registration or admin page)
     *
     * @param $newUser
     * @return boolean
     */
    public function create($newUser)
    {
        $user = new User();
        $user->name = strip_tags(addslashes($newUser['name']));
        $user->email = strip_tags(addslashes($newUser['email']));
        $user->username = strip_tags(addslashes($newUser['username']));

        if (isset($newUser['password'])) {
            $user->password = $newUser['password'];
        }

        $role = $newUser['role'] ?? '';
        if (empty($role)) {
            $role = 'user';
        }

        $result = $user->save();
        $user->assignRole($role);

        return $result;
    }

    /**
     * Update user
     *
     * @param $updatedUser
     * @return void
     */
    public function update($updatedUser)
    {
        try {
            $user = User::findOrFail($updatedUser['id']);
            $infoUpdated = false;

            if ($user->name != $updatedUser['name']) {
                $infoUpdated = true;
                $user->name = strip_tags(addslashes($updatedUser['name']));
            }

            if ($user->email != $updatedUser['email']) {
                $infoUpdated = true;
                $user->email = strip_tags(addslashes($updatedUser['email']));
            }

            if ($user->username != $updatedUser['username']) {
                $infoUpdated = true;
                $user->username = strip_tags(addslashes($updatedUser['username']));
            }

            if (!empty($newUser['password'])) {
                $infoUpdated = true;
                $user->password = $newUser['password'];
            }

            if ($infoUpdated) {
                $user->save();
            }

            $role = $updatedUser['role'];
            if (!isset($role)) {
                $role = 'user';
            }

            $user->assignRole($role);

            return true;
        } catch (ModelNotFoundException $e) {
            Log::debug($e);
        }

        return false;
    }

    /**
     * Retrieve user with the specified ID
     *
     * @param $id
     * @return null | User
     */
    public function get($id)
    {
        try {
            return User::find($id);
        } catch (ModelNotFoundException $e) {
            Log::debug($e);
        }

        return null;
    }

    /**
     * Retrieve all users
     *
     * @param $paginate
     * @param $countPerPage
     * @return mixed
     */
    public function all($paginate = false, $countPerPage = 15)
    {
        if ($paginate) {
            $users = User::paginate($countPerPage);
        } else {
            $users = User::all();
        }

        return $users;
    }

    /**
     * Delete user
     *
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
