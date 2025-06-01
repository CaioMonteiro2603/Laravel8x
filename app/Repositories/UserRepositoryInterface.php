<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
  public function findall();
  public function findById($id);
  public function findByEmail(string $email);
  public function create(array $data);
  public function update($id, array $data);
  public function delete($id);
}
