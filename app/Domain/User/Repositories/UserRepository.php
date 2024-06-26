<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;

class UserRepository
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(User $user, array $data)
    {
        $user->update($data);
        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function getById(int $id)
    {
        return User::findOrFail($id);
    }
}
