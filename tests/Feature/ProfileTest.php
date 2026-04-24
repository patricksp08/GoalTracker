<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/profile');

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->put(route('users.update', $user->id), [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => null,
            ]);

        $response->assertRedirect();

        $user->refresh();

        $this->assertSame('Test User', $user->name);
        $this->assertSame('test@example.com', $user->email);
    }

    public function test_email_remains_the_same_when_not_changed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->put(route('users.update', $user->id), [
                'name' => 'Test User',
                'email' => $user->email,
            ]);

        $response->assertRedirect();

        $this->assertSame($user->email, $user->fresh()->email);
    }

    public function test_user_can_update_profile_photo(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $file = UploadedFile::fake()->create('avatar.jpg', 100);

        $response = $this
            ->actingAs($user)
            ->put(route('users.update', $user->id), [
                'name' => $user->name,
                'email' => $user->email,
                'photo' => $file,
            ]);

        $response->assertRedirect();

        $user->refresh();

        $this->assertNotNull($user->photo);

        Storage::disk('public')->assertExists($user->photo);
    }

    public function test_user_can_delete_their_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete(route('users.destroy', $user->id));

        $response->assertRedirect();

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    public function test_user_cannot_delete_other_user(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $response = $this
            ->actingAs($user1)
            ->delete(route('users.destroy', $user2->id));

        $response->assertStatus(403);

        $this->assertNotNull($user2->fresh());
    }
}