<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function edit($id)
    {
        $user = $this->service->find($id);

        $this->authorize('view', $user);

        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = $this->service->find($id);

        $this->authorize('update', $user);

        $this->service->update($id, $request->validated());

        return redirect()->route('dashboard')->with('success', 'Atualizado!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $this->authorize('destroy', $user);

        Auth::logout();

        $user->delete();

        return redirect('/login');
    }
}