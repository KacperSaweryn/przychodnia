<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visits = Visit::all();
        return view('visits.index', compact('visits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('visits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'visit_date' => 'required|date',
            'visit_time' => 'required',
            'doctor_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:users,id',
            'description' => 'required'
        ]);

        $visit = Visit::create($validatedData);

        return redirect()->route('visits.show', $visit->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visit $visit)
    {
        return view('visits.edit', compact('visit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visit $visit)
    {
        $validatedData = $request->validate([
            'visit_date' => 'required|date',
            'visit_time' => 'required',
            'doctor_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:users,id',
            'description' => 'required'
        ]);

        $visit->update($validatedData);

        return redirect()->route('visits.show', $visit->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        $visit->delete();
        return redirect()->route('visits.index');
    }

    public function search(Request $request)
    {
        $query = Visit::query();

        if ($request->has('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->has('time')) {
            $query->whereTime('time', $request->time);
        }

        if ($request->has('doctor')) {
            $query->whereHas('doctor', function ($subQuery) use ($request) {
                $subQuery->where('id', $request->doctor);
            });
        }

        if ($request->has('patient')) {
            $query->whereHas('patient', function ($subQuery) use ($request) {
                $subQuery->where('id', $request->patient);
            });
        }

        if ($request->has('id')) {
            $query->where('id', $request->id);
        }

        $visits = $query->get();

        return view('visits.index', compact('visits'));
    }

}
