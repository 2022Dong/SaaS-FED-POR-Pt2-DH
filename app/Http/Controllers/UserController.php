<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //$users = User::all();
        $users = User::paginate(10);
        $trashedCount = User::onlyTrashed()->latest()->get()->count();
        return view('users.index', compact(['users', 'trashedCount',]));
        return view('users.index', compact(['users',]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        // Validate
        $rules = [
            'name' => ['string', 'required', 'min:3', 'max:128'],
            'email' => ['required', 'email:rfc', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(4)->letters(),],
        ];
        $validated = $request->validate($rules);

        // Store
        $user = User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        // Assign the "Client" role
        $user->assignRole('Client');   // TODO...

        return redirect(route('users.index'))
            ->withSuccess("Added '{$user->name}'.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $user = User::find($id);
        return view('users.show', compact(['user',]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $user = User::find($id);
        /*
         * Pluck is used to get just the "name" field from the Roles
         * This then is used to show the possible roles on the admin page
         * and allow the allocation of the role to the user.
         */
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if (empty($request['password'])) {
            unset($request['password']);
            unset($request['password_confirmation']);
        }
        // Validate
        $rules = [
            'name' => [
                'string',
                'required',
                'min:3',
                'max:128'
            ],
            'email' => [
                'required',
                'email:rfc',
                Rule::unique('users')->ignore($user),
            ],
            'password' => [
                'sometimes',
                'confirmed',
                Password::min(4)->letters(), // ->uncompromised(),
            ],
            'password_confirmation' => [
                'sometimes',
                'required_unless:password,null',
            ],

        ];
        $validated = $request->validate($rules);

        // Store
        $user->update(
            $validated
            //            [
            //                'name' => $validated['name'],
            //                'email' => $validated['email'],
            //                'password' => $validated['password'],
            //                'updated_at' => now(),
            //            ]
        );

        return redirect(route('users.show', $user))
            ->withSuccess("Updated {$user->name}.");
    }

    /**
     * Show form to confirm deletion of user resource from storage.
     */
    public function delete(User $user): View
    {
        return view('users.delete', compact(['user']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $oldUser = $user;
        $user->delete();

        return redirect(route('users.index'))
            ->withSuccess("Deleted {$oldUser->name}.");
    }

    /**
     * Return view showing all users in the trash.
     */
    public function trash(): View
    {
        //$users->delete();
        $users = User::onlyTrashed()->latest()->get();
        return view('users.trash', compact(['users']));
    }

    /**
     * Recover a user from trash
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id): RedirectResponse
    {
        $user = User::onlyTrashed()->find($id);
        $user->restore();
        return redirect()
            ->back()
            ->withSuccess("Restored {$user->name}.");
    }

    /**
     * Recover all users in the trash to system
     *
     * @return RedirectResponse
     */
    public function recover(): RedirectResponse
    {
        $users = User::onlyTrashed()->get();
        $trashCount = $users->count();

        foreach ($users as $user) {
            $user->restore(); // This restores the soft-deleted user
        }
        return redirect(route('users.index'))
            ->withSuccess("Successfully recovered {$trashCount} users.");
    }

    /**
     * Permanently removing a SINGLE user from trash
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function remove(string $id): RedirectResponse
    {
        $user = User::onlyTrashed()->find($id);
        $oldUser = $user;
        $user->forceDelete();
        return redirect()
            ->back()
            ->withSuccess("Permanently Removed {$oldUser->name}.");
    }

    /**
     * Permanently remove all users that are in the trash
     *
     * @return RedirectResponse
     */
    public function empty(): RedirectResponse
    {
        $users = User::onlyTrashed()->get();
        $trashCount = $users->count();
        foreach ($users as $user) {
            $user->forceDelete(); // This restores the soft-deleted user
        }
        return redirect(route('users.trash'))
            ->withSuccess("Successfully emptied trash of {$trashCount} users.");
    }
}
