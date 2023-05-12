<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $doctors = User::where('type_id', 2)->get();
        $patients = User::where('type_id', 3)->get();
        return view('visits.create',compact('doctors','patients'));
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
            'patient_id' => 'required|exists:users,id'
//            ,
//            'description' => 'required'
        ]);

        $visit = Visit::create($validatedData);

        return redirect()->route('visits.show', $visit->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit)
    {
        return view('visits.show', ['visit' => $visit]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visit $visit)
    {
        $doctors = User::where('type_id', 2)->get();
        $patients = User::where('type_id', 3)->get();
        return view('visits.edit', compact('visit','doctors','patients'))
            ->with('visit_date', $visit->visit_date)
            ->with('visit_time', $visit->visit_time);;
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
            'patient_id' => 'required|exists:users,id'
        ]);

        $visit->update($validatedData);

        return redirect()->route('visits.index', $visit->id);
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

        if ($request->has('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('visit_date', 'like', '%'.$search.'%')
                    ->orWhere('visit_time', 'like', '%'.$search.'%')
                    ->orWhereHas('doctor', function ($dq) use ($search) {
                        $dq->where('name', 'like', '%'.$search.'%')
                            ->orWhere('surname', 'like', '%'.$search.'%');
                    })
                    ->orWhereHas('patient', function ($pq) use ($search) {
                        $pq->where('name', 'like', '%'.$search.'%')
                            ->orWhere('surname', 'like', '%'.$search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$search.'%');
            });
        }

        $visits = $query->get();

        return view('visits.index', compact('visits'));
    }

}
