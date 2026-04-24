<?php
namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function view(User $user, User $targetUser)
    {
        return $targetUser->id === $user->id;
    }

    public function update(User $user, User $targetUser)
    {
        return $targetUser->id === $user->id;
    }

    public function destroy(User $user, User $targetUser)
    {
        return $targetUser->id === $user->id;
    }
}