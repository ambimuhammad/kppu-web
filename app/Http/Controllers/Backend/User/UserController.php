<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User\User;
use App\Models\Group\Group;
use DB;
use Auth;
use App\Traits\Authorizable;

class UserController extends Controller
{
    use Authorizable;

    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $users = User::orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $users = User::where('id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        }
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $role = Role::orderBy('name', 'ASC')->get();
        return view('users.create', compact('role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|string|exists:roles,name'
        ]);

        $user = User::firstOrCreate([
            'email' => $request->email
        ], [
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'status' => true
        ]);

        $user->assignRole($request->role);
        return redirect(route('users.index'))->with(['success' => 'User: <strong>' . $user->name . '</strong> Ditambahkan']);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|exists:users,email',
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);
        $password = !empty($request->password) ? bcrypt($request->password) : $user->password;
        $user->update([
            'name' => $request->name,
            'password' => $password
        ]);
        return redirect(route('users.index'))->with(['success' => 'User: <strong>' . $user->name . '</strong> Diperbaharui']);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['success' => 'User: <strong>' . $user->name . '</strong> Dihapus']);
    }

    public function roles(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name');
        return view('users.roles', compact('user', 'roles'));
    }

    public function setRole(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->syncRoles($request->role);
        return redirect()->back()->with(['success' => 'Role Sudah Di Set']);
    }

    public function rolePermission(Request $request)
    {
        $role = $request->get('role');
        $permissions = null;
        $hasPermission = null;

        $roles = Role::all()->pluck('name');

        if (!empty($role)) {
            $getRole = Role::findByName($role);
            $hasPermission = DB::table('role_has_permissions')
                ->select('permissions.name')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_id', $getRole->id)->get()->pluck('name')->all();
            $permissions = Group::with('permissions')->orderBy('id','ASC')->get();
            // dd($perm);
            //$permissions = Permission::orderBy('id','ASC')->get()->pluck('name')->all();
        }
        return view('users.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }

    public function addPermission(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions',
            'group_name' => 'required|string'
        ]);
        $group = Group::updateOrCreate([
            'name' => $request->group_name
        ]);

        $permission = Permission::firstOrCreate([
            'group_id' => $group->id,
            'name' => $request->name
        ]);
        return redirect()->back();
    }

    public function setRolePermission(Request $request, $role)
    {
        $role = Role::findByName($role);
        
        $data = [];
        foreach ($request->input('permission') as $perm) {
            $ddd = json_decode($perm);
            $sdsd = $ddd->id;
            $data[] = [
                'permission_id' => $sdsd,
                'role_id' => $role->id
            ];
        }
        DB::table('role_has_permissions')->where('role_id', $role->id)->delete();
        DB::table('role_has_permissions')->insert($data);
        return redirect()->back()->with(['success' => 'Permission to Role Saved!']);
    }
}
