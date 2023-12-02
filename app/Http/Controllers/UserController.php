<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;
use Throwable;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group ">';
                    $btn = $btn . '<a class="btn btn-info btn-sm" href="' . route('users.show', $row->id) . '" role="button"><i class="bi bi-info-circle"></i></a>';
                    $btn = $btn . '<a class="btn btn-primary btn-sm" href="' . route('users.edit', $row->id) . '" role="button"><i class="bi-pencil-square"></i></a>';
                    $btn = $btn . '<button class="btn btn-danger delete-btn btn-sm" data-id="' . $row->id . '" data-nama="' . $row->name . '"><i class="bi-trash3"></i></button>';
                    return $btn . '</div>';
                })
                ->addColumn('roles', function ($row) {
                    $roles = $row->getRoleNames();
                    return $roles[0];
                })
                ->rawColumns(['action', 'roles'])
                ->make();
        }
        return view('users.index');
    }

    public function create(): View
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'Akun berhasil dibuat');
    }

    public function show($id): View
    {
        $user = User::find($id);
        $roles_id = $user->roles->first()->id;
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $roles_id)
            ->get()
            ->pluck('name');
        return view('users.show', compact('user', 'rolePermissions'));
    }

    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'Akun Berhasil Diupdate');
    }

    public function destroy($id)
    {
//        User::find($id)->delete();
//        return redirect()->route('users.index')
//            ->with('success', 'User deleted successfully');

        try {
            User::find($id)->delete();
            return Response::json([
                'success' => true,
                'data' => 'Akun berhasil dihapus'
            ]);
        } catch (Throwable $e) {
            $error = sprintf('[%s]', json_encode($e->getMessage(), true));
            return Response::json([
                'success' => false,
                'data' => $error
            ]);
        }
    }
}
