<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Position;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PositionControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            "title" => "Position | IMI Tracking",
        ];
        return view('positions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
        try {
            $payload = [
                'uid' => Str::slug(request('name')),
                'name' => request('name'),
            ];
            Position::create($payload);
            return redirect('/positions')->with(['alertSuccess' => 'Successfully create position data!']);
        } catch (Throwable $th) {
            dd($th);
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return redirect('/positions')->with(['alertError' => 'Position data already registered!']);
            }
            return redirect('/positions')->with(['alertError' => 'Failed to add new position!']);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        //
        try {
            $position->delete();
            return redirect('/positions')->with(['alertSuccess' => 'Successfully deleted position data!']);
        } catch (Throwable $th) {
            dd($th);
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return redirect('/positions')->with(['alertError' => 'Position data already registered!']);
            }
            return redirect('/positions')->with(['alertError' => 'Failed to deleted position!']);
        };
    }
    public function datatables()
    {
        return Position::all();
    }
}
