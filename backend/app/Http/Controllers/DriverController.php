<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverRequest;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(Request $request)
    {
        $query = Driver::query();

        if ($teamId = $request->get('team_id')) {
            $query->where('team_id', $teamId);
        }

        return response()->json($query->get());
    }

    public function store(StoreDriverRequest $request)
    {
        $driver = Driver::create($request->validated());

        return response()->json($driver, 201);
    }

    public function show(Driver $driver)
    {
        return response()->json($driver);
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();

        return response()->json(null, 204);
    }
}