<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $users;

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function getAll()
    {
        return response()->json($this->users->findall());
    }

    public function getById($id)
    {
        return response()->json($this->users->findById($id));
    }

    public function getByEmail($email)
    {
        $user = $this->users->findByEmail($email);
        return response()->json($user);
    }

    public function create(Request $request)
    {
        $data = $request->only(['name', 'age', 'email', 'password']);
        $user = $this->users->create($data);
        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'age', 'email', 'password']);
        $user = $this->users->update($id, $data);
        return response()->json($user);
    }

    public function delete($id)
    {
        $this->users->delete($id);
        return response()->json(['message' => 'Usuário deletado.']);
    }
}
