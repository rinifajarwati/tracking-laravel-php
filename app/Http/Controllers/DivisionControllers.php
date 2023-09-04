<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DivisionControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=[
            "title" =>"Division | IMI Tracking",
        ];
        return view('divisions.index', $data);
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
            Division::create($payload);
            return redirect('/divisions')->with(['alertSuccess' => 'Successfully create division data!']);
        } catch (Throwable $th) {
            dd($th);
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return redirect('/divisions')->with(['alertError' => 'Division data already registered!']);
            }
            return redirect('/divisions')->with(['alertError' => 'Failed to add new division!']);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        //
        try {
            $division->delete();
            return redirect('/divisions')->with(['alertSuccess' => 'Successfully deleted division data!']);
        } catch (Throwable $th) {
            dd($th);
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return redirect('/divisions')->with(['alertError' => 'Division data already registered!']);
            }
            return redirect('/divisions')->with(['alertError' => 'Failed to deleted division!']);
        };
    }

    public function datatables()
    {
        return Division::all();
    }

}
