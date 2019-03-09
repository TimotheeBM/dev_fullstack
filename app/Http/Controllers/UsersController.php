<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        return User::all();
    }
 
    public function show(int $userId)
    {
        return User::find($userId);
    }
 
    public function store(Request $request)
    {
        $user = User::create($request->all());
 
        return response()->json($user, 201);
    }
 
    public function update(Request $request, User $user)
    {
        $user->update([
            'pseudo' => $request->pseudo,
            'password' => bcrypt($request->password)
        ]);
        return response()->json($user, 200);
    }

    public function delete(int $userId)
    {
        $user = User::find($userId);
        if (!empty($user))
            $user->delete();
 
        return response()->json(null, 204);
    }
}
