<?php

namespace App\Contracts\Users\Repositories;

use App\Models\Users\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{

    public const COMUM = 1;

    public const LOGISTA = 2;

    /**
     * @param array $dados
     * @return User
     */
    public function create(array $dados): User;

        /**
     * Método listar tarnsações
     * @return array
     * @throws \Exception
     */
    public function list(): array;
}
