<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
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
            $data = User::where('role','!=','ROLE_ADMIN')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds row index
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                ->addColumn('email', function($row) {
                    return $row->email;
                })
                ->addColumn('role', function($row) {
                    // Display the role with a badge
                    if ($row->role == 'ROLE_FRANCHISE') {
                        return '<span class="badge rounded-pill badge-soft-primary font-size-12">Franchise</span>';
                    } else if ($row->role == 'ROLE_BUYER') {
                        return '<span class="badge rounded-pill badge-soft-info font-size-12">Buyer</span>';
                    }
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('backend.users.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action', 'role', 'status'])
                ->make(true);
        }

        return view('backend.users.index');
    }

    // Show create form
    public function create()
    {
        $roles = ['ROLE_FRANCHISE', 'ROLE_BUYER'];
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
            'role' => 'required|in:ROLE_BUYER,ROLE_FRANCHISE',
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
            'role' => $request->role ?? 'ROLE_FRANCHISE',
            'profile_image' => $imagePath,
            'status' => 1, // Default to active
        ]);

        return redirect()->route('backend.users.index')->with('success', 'User created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = ['ROLE_BUYER', 'ROLE_FRANCHISE'];
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
            'role' => 'required|in:ROLE_BUYER,ROLE_FRANCHISE',
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

        // Update the user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'profile_image' => $imagePath,
        ]);

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
