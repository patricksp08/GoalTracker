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
        $user = User::findOrFail($id);

        // Upload da foto
        if (isset($data['photo']) && $data['photo'] instanceof \Illuminate\Http\UploadedFile) {

            // Deleta antiga
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            $data['photo'] = $data['photo']->store('users', 'public');
        } else {
            unset($data['photo']);
        }

        // Senha opcional
        if (empty($data['password'])) {
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