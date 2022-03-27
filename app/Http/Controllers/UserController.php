<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $users = User::orderBy('created_at', 'DESC');
        $users = $users->simplePaginate(99)->toArray()['data'];

        return view('user.index', compact('user', 'users'));
    }

    public function create(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->username;
        $user->phone = $request->phone;
        $user->role = $request->role;

        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'phone' => 'nullable|string',
            'role' => ['required', Rule::in(config('constant.user.roles'))],
        ]);

        $user->save();

        return redirect()->back()->with('success', 'Berhasil menambah user!');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus user!');
    }

    // TODO: cant remembr, pls contriboots lol
}
