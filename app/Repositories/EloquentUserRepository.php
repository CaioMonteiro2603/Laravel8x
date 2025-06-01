<?php

namespace App\Repositories;

use App\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
  public function findall()
  {
    return User::all();
  }

  public function findById($id)
  {
    return User::findOrFail($id); // esse método vem da eloquent orm
  }

  public function create(array $data)
  {
    return User::create($data);
  }

  public function findByEmail(string $email)
  {
    return User::where('email', $email)->firstOrFail();
  }

  public function update($id, array $data)
  {
    $user = User::findOrFail($id);
    $user->update($data);
    return $user;
  }

  public function delete($id)
  {
    $user = User::findOrFail($id);
    $user->delete();
    return true;
  }
}
