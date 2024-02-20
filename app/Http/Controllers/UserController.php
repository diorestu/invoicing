<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $data = User::latest()->paginate();
        return view('users.index', compact('data'));
    }

    public function create()
    {
        $user = new User;
        return view('users.create', compact('user'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'nama'     => 'required|string',
            // 'username' => 'string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        $data['password']     = Hash::make($data['password']);
        $data['username']     = $data['email'];
        $data['id_smartwork'] = 1;
        // $data['email_verified_at'] = now();
        $user = User::create($data);
        $user->assignRole($request->role);

        return to_route('users.index')->withSuccess('Data succcessfully created.');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users,email,' . $user->id,
                'password' => $request->password ? 'required|confirmed' : '',
            ]);
            // dd($request->all());
            $data['name'] = $request->name;
            if ($request->password) {
                $data['password'] = Hash::make('password');
            }
            $data['email'] = $request->email;
            $user->update($data);
            $user->syncRoles([]);
            $user->assignRole($request->role);

            return to_route('users.index')->withSuccess('Data Pengguna berhasil diperbaharui.');
        } catch (\Throwable $th) {
            return redirect()->back()->withError('Gagal: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        $user->delete();
        return to_route('users.index')->withSuccess('Data successfully deleted.');
    }
}
