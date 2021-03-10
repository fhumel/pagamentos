<?php

namespace App\Http\Controllers\Users;

use App\Contracts\Users\Mappers\UserMapperInterface;
use App\Contracts\Users\Services\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{

    /** @var \App\Contracts\Users\Services\UserServiceInterface */
    private UserServiceInterface $userService;

    /** @var \App\Contracts\Users\Mappers\UserMapperInterface */
    private UserMapperInterface $userMapper;

    /**
     * UserController constructor.
     * @param \App\Contracts\Users\Services\UserServiceInterface $userService
     * @param \App\Contracts\Users\Mappers\UserMapperInterface   $userMapper
     */
    public function __construct(UserServiceInterface $userService, UserMapperInterface $userMapper)
    {
        $this->userService = $userService;
        $this->userMapper = $userMapper;
    }

    /**
     * @inheritDoc
     */
    public function create(UserRequest $request): JsonResponse
    {
        try {
            $dados = $request->getParams()->all();

            /** @var \App\Entities\Users\UserEntity $entidade */
            $entidade = $this->userService->register($dados);

            return response()->json(
                [
                    "descricao" => "Usuário criado com sucesso.",
                    "user" => $entidade,
                ],
                Response::HTTP_CREATED
            );
        } catch (\Exception $exception) {
            /** @var int $statusCode */
            $statusCode = $exception instanceof HttpException
                ? $exception->getStatusCode() : Response::HTTP_BAD_REQUEST;

            return response()->json([
                'codigo' => $statusCode,
                'descricao' => 'Não foi possível cadastrar um usuário no momento.']);
        }
    }

    /**
     * @inheritDoc
     */
    public function list(): JsonResponse
    {
        try {
            /** @var \App\Entities\Users\UserEntity $colecao */
            $colecao = $this->userService->list();

            return response()->json(
                $colecao,
                Response::HTTP_FOUND
            );
        } catch (\Exception $exception) {
            /** @var int $statusCode */
            $statusCode = $exception instanceof HttpException
                ? $exception->getStatusCode() : Response::HTTP_BAD_REQUEST;

            return response()->json([
                'codigo' => $statusCode,
                'descricao' => 'Não foi possível listar os usuários no momento.']);
        }
    }
}
