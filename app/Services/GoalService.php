<?php
namespace App\Services;

use App\Models\Goal;

class GoalService
{
    public function list($userId)
    {
        return Goal::where('user_id', $userId)
            ->orderBy('completed')
            ->orderBy('due_date')
            ->get();
    }

    public function create($data, $userId)
    {
        $data['user_id'] = $userId;
        return Goal::create($data);
    }

    public function find($id)
    {
        return Goal::findOrFail($id);
    }

    public function update($id, $data)
    {
        $goal = $this->find($id);

        $goal->update([
            'title' => $data['title'] ?? $goal->title,
            'description' => $data['description'] ?? $goal->description,
            'due_date' => $data['due_date'] ?? $goal->due_date,
            'completed' => $data['completed'] ?? $goal->completed,
        ]);

        return $goal;
    }

    public function delete($id)
    {
        return Goal::destroy($id);
    }
}