<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserService
{
    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function update($id, $data)
    {
        $user = $this->find($id);

        if (isset($data['photo'])) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            $data['photo'] = $data['photo']->store('users', 'public');
        }

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return $user;
    }

    public function delete($id)
    {
        return User::destroy($id);
    }
}