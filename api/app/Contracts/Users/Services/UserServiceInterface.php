<?php

namespace App\Contracts\Users\Services;

use App\Models\Users\User;

interface UserServiceInterface
{
        /**
     * Método listar
     * @return array
     * @throws \Exception
     */
    public function list(): array;

    /**
     * Método listar
     * @param array $dados
     * @return User
     * @throws \Exception
     */
    public function register(array $dados): User;
}
