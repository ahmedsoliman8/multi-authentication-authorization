<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

   /* public static function middleware(): array
    {
        return [
            //    new Middleware('checkPermission:add_user', only: ['create', 'store']),
            //    new Middleware('checkPermission:show_user', only: ['show']),
            //    new Middleware('checkPermission:edit_user', only: ['edit', 'update']),
            //    new Middleware('checkPermission:delete_user', only: ['destroy']),
        ];
    }*/



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('back.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::forUser(Auth::guard('admin')->user())->authorize('add_user');
        //$this->authorize('create', User::class);
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        dd('store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        Gate::forUser(Auth::guard('admin')->user())->authorize('add_user');
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('edit', User::class);
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd('update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', User::class);
        dd('destroy');
    }
}
