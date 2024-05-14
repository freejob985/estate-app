<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(10);
  $search = $request->input('search');
        $properties = Property::when($search, function ($query, $search) {
            return $query->where('unit_code', 'like', "%$search%")
                ->orWhere('unit_type', 'like', "%$search%")
                ->orWhere('phase', 'like', "%$search%")
                ->orWhere('floor', 'like', "%$search%")
                ->orWhere('client_number', 'like', "%$search%")
                ->orWhere('region', 'like', "%$search%")
                ->orWhere('compound_name', 'like', "%$search%");
        })
        ->with('images', 'user')
        ->paginate(10);
        return view('users.index', compact('users','properties'));
    }

    public function create()
    {
 if (!auth()->check()) {
        return redirect()->route('login');
    }
        return view('users.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
    'phone_number' => 'nullable|string|max:20',

        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'تم إضافة المستخدم بنجاح.');
    }

    public function edit(User $user)
    {
 if (!auth()->check()) {
        return redirect()->route('login');
    }
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
    'phone_number' => 'nullable|string|max:20',

        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'تم تعديل المستخدم بنجاح.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح.');
    }
}
