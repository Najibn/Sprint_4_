<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // Listing all users
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Showing form to create a new user
    public function create()
    {
        $roles = $this->getAvailableRoles();

        return view('admin.users.create', compact('roles'));
    }

    // Save a new user
    public function store(Request $request)
    {
        $validatedData = $this->validateUserData($request);
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        
        User::create($validatedData);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully');
    }

    //Display a specific user
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    //Showing form to edit a user
    public function edit(User $user)
    {
        $roles = $this->getAvailableRoles();
        
        return view('admin.users.edit', compact('user', 'roles'));
    }


    //
    public function update(Request $request, User $user)
    {
        $validatedData = $this->validateUserData($request, $user->id, false);
        
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        }

        $user->update($validatedData);

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully');
    }

    // Delete a specific user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }

    //helper functions: getting the availabe user->roles
    private function getAvailableRoles()
    {
        return ['admin', 'customer', 'technician'];
    }


    private function validateUserData(Request $request, $userId = null, $requirePassword = true)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . ($userId ? '|unique:users,email,' . $userId : '|unique:users'),
            'role' => 'required|in:' . implode(',', $this->getAvailableRoles()),
            'phone' => 'required|string|max:20',
        ];

        // Only allowing passwords for new users
        if ($requirePassword) {
            $rules['password'] = 'required|string|min:8';
        } else {
            $rules['password'] = 'nullable|string|min:8';
        }

        return $request->validate($rules);
    }

/*roles control for later
    public function isTechnician()
    {
        return $this->role === 'technician';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isCustomer()
    {
        return $this->role === 'customer';
    }
*/
}
