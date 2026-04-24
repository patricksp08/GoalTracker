<?php
namespace App\Http\Controllers;

use App\Services\GoalService;
use App\Http\Requests\GoalRequest;
use App\Models\Goal;

class GoalController extends Controller
{
    protected $service;

    public function __construct(GoalService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $goals = $this->service->list(auth()->id());

        return view('goals.index', compact('goals'));
    }

    public function create()
    {
        return view('goals.create');
    }

    public function store(GoalRequest $request)
    {
        $this->service->create($request->validated(), auth()->id());

        return redirect()
            ->route('goals.index')
            ->with('success', 'Meta criada com sucesso!');
    }

    public function edit($id)
    {
        $goal = $this->service->find($id);
        
        $this->authorize('update', $goal);

        return view('goals.edit', compact('goal'));
    }

    public function update(GoalRequest $request, $id)
    {
        $goal = $this->service->find($id);

        $this->authorize('update', $goal);

        $this->service->update($id, $request->validated());

        return redirect()->route('goals.index')->with('success', 'Atualizada!');
    }

    public function destroy($id)
    {
        $goal = $this->service->find($id);

        $this->authorize('destroy', $goal);

        $this->service->delete($id);

        return redirect()->route('goals.index')->with('success', 'Removida!');
    }
}