<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest; 
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $query = Team::query();

        if ($orderBy = $request->get('orderBy')) {
            $order = $request->get('order', 'asc');
            $query->orderBy($orderBy, $order);
        }

        return response()->json(['data' => $query->get()]);
    }

    public function store(StoreTeamRequest $request) 
    {
        $team = Team::create($request->validated());

        return response()->json($team, 201);
    }

    public function show(Team $team)
    {
        return response()->json($team);
    }

    public function update(Request $request, Team $team) 
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:50',
            'country' => 'sometimes|required|string|max:50',
            'founded' => 'sometimes|required|date',
            'team_principal' => 'sometimes|required|string|max:50',
        ]);

        $team->update($validated);

        return response()->json($team);
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return response()->json(null, 204);
    }
}