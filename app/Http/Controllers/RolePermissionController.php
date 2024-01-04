<?php

namespace App\Http\Controllers;
use App\Models\MonthlyHoliday;
use App\Models\Payroll;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
    {
        $this->authorize('list permission');
        $roles = Role::all();
        $permissions = Permission::all();

        return view('roles.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('add role');
        return view('roles.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('add role');
        if (Role::create(['name' => $request->role_name])){
            return redirect()->route('roles.index')->with('success', 'New role add Successfully!');
        }
        return redirect()->route('roles.index')->with('error', 'Something Went Wrong!');
    }


    public function updateRoles(Request $request)
    {
        $this->authorize('edit permission');
        $permissions = $request->input('permissions');
        // Loop through the selected permissions and assign them to each role
        foreach ($permissions as $roleName => $selectedPermissions) {
            $role = Role::findByName($roleName);
            $role->syncPermissions($selectedPermissions);
        }

        return redirect()->route('roles.index')->with('success', 'Permission updated successfully');
    }
}
