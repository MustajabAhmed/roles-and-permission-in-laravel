<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class UserController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function show($id)
    {
        $user = User::with('authentications')->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // 'phone' => 'nullable|string|max:255|unique:users,phone,' . $user->id,
            'new_password' => 'nullable|string',
        ]);
        $user->fill($request->only([
            'name',
            'email',
            // 'phone',
            // 'authority',
        ]));

        // $user->syncRoles($request->input('roles'));

        if (!is_null($request->new_password)) {
            $user->password = Hash::make($request->new_password);
        }

        $user->syncRoles($request->role);

        $user->update();

        return back()->with('success', __('User updated successfully.'));;
    }

    public function data(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("users")
                ->select("id", "email", "name")
                ->where('email', 'LIKE', "%$search%")
                ->orWhere('name', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $users = User::query();
            return Datatables::of($users)
                ->addColumn('action', function ($user) {
                    return '<a href="' . route('admin.users.show', $user->id) . '" class="btn btn-sm btn-soft-success">' . __('Show') . '</a>';
                })
                ->addColumn('role', function ($user) {
                    return $user->role();
                })
                ->addColumn('created_at', function ($user) {
                    return $user->created_at->format('d/m/Y H:i:s');
                })
                ->make(true);
        }
    }

    public function connect($id)
    {
        $user = User::findOrFail($id);
        Auth::loginUsingId($user->id);
        return redirect()->route('customer.index')->with('success', __('Connected to user account successfully.'));
    }
}
