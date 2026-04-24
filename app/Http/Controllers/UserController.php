<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\UserRequest;

class UserController
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function edit($id)
    {
        $user = $this->service->find($id);
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('dashboard')->with('success', 'Atualizado!');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('dashboard')->with('success', 'Deletado!');
    }
}