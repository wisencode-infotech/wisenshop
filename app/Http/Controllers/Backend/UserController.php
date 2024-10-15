<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    // Listing users
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('user_role_id','!=',1)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds row index
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                ->addColumn('email', function($row) {
                    return $row->email;
                })
                ->addColumn('user_role_id', function($row) {
                    // Display the role with a badge
                    if ($row->userRole->role == 'franchise') {
                        return '<span class="badge rounded-pill badge-soft-primary font-size-12">Franchise</span>';
                    } else if ($row->userRole->role == 'buyer') {
                        return '<span class="badge rounded-pill badge-soft-info font-size-12">Buyer</span>';
                    }
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('backend.users.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action', 'user_role_id', 'status'])
                ->make(true);
        }

        return view('backend.users.index');
    }

    // Show create form
    public function create()
    {
        $roles = UserRole::where('role', '!=', 'admin')->get();
        return view('backend.users.create', compact('roles'));
    }

    // Store new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|nullable|string|max:15',
            'role' => 'required',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        } else {
            $imagePath = null;
        }

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'user_role_id' => $request->role,
            'profile_image' => $imagePath,
            'status' => 1, // Default to active
        ]);

        return redirect()->route('backend.users.index')->with('success', 'User created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = UserRole::where('role', '!=', 'admin')->get();
        return view('backend.users.edit', compact('user', 'roles'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:15',
            'role' => 'required',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('profile_image')) {
            // Delete old image
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }

            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        } else {
            $imagePath = $user->profile_image;
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_role_id' => $request->role,
            'profile_image' => $imagePath,
        ];

        // Only update the password if it's not blank
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Update the user with the prepared data
        $user->update($data);

        return redirect()->route('backend.users.index')->with('success', 'User updated successfully.');
    }

    // Delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Delete profile image if it exists
        if ($user->profile_image) {
            Storage::delete('public/' . $user->profile_image);
        }

        // Delete user
        $user->delete();

        return response()->json(['success' => 'User deleted successfully.']);
    }
}
