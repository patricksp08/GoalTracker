<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Goal;

class GoalPolicy
{
    public function view(User $user, Goal $goal)
    {
        return $goal->user_id === $user->id;
    }

    public function update(User $user, Goal $goal)
    {
        return $goal->user_id === $user->id;
    }

    public function destroy(User $user, Goal $goal)
    {
        return $goal->user_id === $user->id;
    }
}