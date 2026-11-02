<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('back.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::where('guard_name', 'admin')->get();

        return view('back.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);
        //   dd($request->permissions);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'admin',
        ]);
        $permissions = Permission::whereIn(
            'id',
            $request->input('permissions', [])
        )
            ->where('guard_name', 'admin')
            ->get();
        //  dd($permissions);

        $role->syncPermissions($permissions);

        return redirect()
            ->route('back.roles.index')
            ->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::where('guard_name', 'admin')->findOrFail($id);
        $permissions = Permission::where('guard_name', 'admin')->get();

        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('back.roles.edit', compact(
            'role',
            'permissions',
            'rolePermissions'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::where('guard_name', 'admin')->findOrFail($id);
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('roles', 'name')
                    ->where('guard_name', 'admin')
                    ->ignore($role->id),
            ],

            'permissions' => ['nullable', 'array'],
            'permissions.*' => [
                'integer',
                Rule::exists('permissions', 'id')
                    ->where('guard_name', 'admin'),
            ],
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        $permissions = Permission::whereIn(
            'id',
            $request->input('permissions', [])
        )
            ->where('guard_name', 'admin')
            ->get();

        $role->syncPermissions($permissions);

        return redirect()
            ->route('back.roles.index')
            ->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
