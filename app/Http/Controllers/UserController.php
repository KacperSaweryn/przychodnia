<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('users.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'login' => 'required|unique:users',
            'password' => 'required',
            'type_id' => 'required|exists:types,id',
        ]);

        $user = new User;
        $user->type_id = $validatedData['type_id'];
        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->login = $validatedData['login'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $types = Type::all();

        return view('users.edit', compact('user', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'login' => 'required|unique:users,login,' . $user->id,
            'type_id' => 'required|exists:types,id',
        ]);

        $user->type_id = $validatedData['type_id'];
        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->login = $validatedData['login'];

        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('name', 'like', '%'.$search.'%')
            ->orWhere('surname', 'like', '%'.$search.'%')
            ->orWhere('login', 'like', '%'.$search.'%')
            ->get();

        return view('users.index', ['users' => $users]);
    }

}
