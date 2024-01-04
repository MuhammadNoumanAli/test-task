<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('list users');
        $data = [];
        $data['users'] = User::latest()->get();
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('add users');
        $data = [];
        $data['roles'] = Role::get();
        return view('users.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->authorize('create users');
        $user = new User();
        $user->password = Hash::make($request->password);
        $this->extracted($request, $user);
        if ($user->save()){
            $role = $request->input('user_role');
            $user->roles()->attach($role);
            return redirect()->route('users.index')->with('success', 'User Created Successfully!');
        }
        return redirect()->route('users.index')->with('error', 'Something Went Wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $this->authorize('view user');
        $data = [];
        $data['user'] = $user;
        return view('users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('edit users');
        $data = [];
        $data['user_roles'] = $user->roles->pluck('id')->toArray();
        $data['roles'] = Role::get();
        $data['user'] = $user;
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('edit users');
        if ($request->filled('password')){
            $user->password = Hash::make($request->password);
        }
        $this->extracted($request, $user);
        if ($user->save()){
            $role_name = $user->getRoleNames();
            if($request['user_role'] != $role_name[0]){
                $user->removeRole($role_name[0]);
                $user->assignRole($request['user_role']);
            }
            return redirect()->route('users.index')->with('success', 'User Update Successfully!');
        }
        return redirect()->route('users.index')->with('error', 'Something Went Wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return void
     */
    public function extracted(UserRequest $request, User $user): void
    {
        if ($request->hasFile('avatar')) {
            if ($request->file('avatar') instanceof \Illuminate\Http\UploadedFile) {
                $result = Storage::disk('public')->put('images', $request->file('avatar'));
                $user->avatar = $result;
            }
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->address = $request->address;
        $user->about = $request->about ?? null;
        $user->contact_number = $request->contact_number;
    }
}
