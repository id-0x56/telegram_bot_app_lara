<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user
            ->all();
    }

    public function paginated($paginate)
    {
        return $this->user
            ->paginate($paginate);
    }

    public function find($id)
    {
        return $this->user
            ->find($id);
    }
}
