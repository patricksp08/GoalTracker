<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Goal;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GoalTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_goals()
    {
        $response = $this->get('/goals');

        $response->assertRedirect('/login');
    }

    public function test_user_can_view_goals()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/goals');

        $response->assertStatus(200);
    }

    public function test_user_can_create_goal()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/goals', [
            'title' => 'Minha meta',
            'description' => 'Descrição teste',
            'due_date' => now()->addDays(5)->format('Y-m-d'),
        ]);

        $response->assertRedirect('/goals');

        $this->assertDatabaseHas('goals', [
            'title' => 'Minha meta',
            'user_id' => $user->id,
        ]);
    }

    public function test_user_cannot_edit_other_users_goal()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $goal = Goal::factory()->create([
            'user_id' => $user1->id
        ]);

        $response = $this->actingAs($user2)->get("/goals/{$goal->id}/edit");

        $response->assertStatus(403);
    }
}