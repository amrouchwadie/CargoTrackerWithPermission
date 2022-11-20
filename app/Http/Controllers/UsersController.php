<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Junges\ACL\Models\Permission;
use Junges\ACL\Models\Group;
use Illuminate\Support\Str;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function role()
    {
        $users = User::all();

        return view('users.role', compact('users'));
    }

    public function create()
    {
        $groups = Group::all();
        $users = User::all();
        return view('users.add', compact('users', 'groups'));
    }

    public function store(Request $request)
    {
        $permissions = Permission::all();

        $users = new User();
        $users->first_name = $request->input('first_name');
        $users->last_name = $request->input('last_name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->password = Hash::make($request->input('password'));


        $users->save();
        $users->assignGroup($request->group_id);
        return redirect('/')->with('success', 'Utilisateur été bien ajouter');
    }

    public function show($id)
    {
        $users = User::all();
        $groups = Group::all();
        $permissions = Permission::all();
        return view('users.show', compact('users', 'groups', 'permissions'));
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        $permissions = Permission::all();
        $groups = Group::all();
        return view('users.edit', compact('users', 'permissions', 'groups'));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->first_name = $request->input('first_name');
        $users->last_name = $request->input('last_name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->password = Hash::make($request->input('password'));
        $users->update();
        $users->assignGroup($request->group_id);
        return redirect('/users')->with('success', 'La modification été bien effectuer');
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->status = 0;
        if ($users->save()) {
            $users->delete();
        }
        return redirect()->back()->with('success', 'la suppression été bien effectuer');
    }

    public function permission()
    {
        $permissions = Permission::all();
        $groups = Group::all();
        return view('users.permission', compact('permissions', 'groups'));
    }

    public function storepermission(Request $request)
    {
        $permissions = Permission::all();
        $permissions = $request->validate([
            'name' => 'required|max:255',
            'permissions' => 'required',
        ]);
        $groups = new Group();
        $groups->name = $request->name;
        $groups->slug = Str::slug($request->name);

        $groups->save();
        $groups->assignPermissions($request->permissions);

        return redirect()->back()->with("success", "Role est bien ajouter", compact('permissions'));
    }

    public function editrole($id)
    {
        $permissions = Permission::all();
        $groups = Group::findOrFail($id);
        return view('users.editrole', compact('groups', 'permissions'));
    }

    public function updaterole(Request $request, $id)
    {
        $permissions = Permission::all();
        $permissions = $request->validate([
            'name' => 'required|max:255',
            'permissions' => 'required',
        ]);
        $groups = Group::find($id);
        $groups->name = $request->name;
        $groups->slug = Str::slug($request->name);

        $groups->update();
        $groups->assignPermissions($request->permissions);

        return redirect()->Route('role.index')->with("success", "La modification du role est bien effectuer", compact('permissions'));
    }

    public function indexrole()
    {
        $permissions = Permission::all();
        $groups = Group::all();
        return view('users.indexrole', compact('permissions', 'groups'));
    }
    public function destroyrole($id)
    {
        $groups = group::find($id);
        $groups->delete();
        return redirect()->back()->with('error', 'la suppression a été effecter');
    }
}
