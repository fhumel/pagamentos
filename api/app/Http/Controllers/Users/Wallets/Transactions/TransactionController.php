<?php

namespace App\Http\Controllers\Users\Wallets\Transactions;

use App\Contracts\Users\Wallets\Transactions\Services\TransactionServiceInterface;
use App\Entities\Users\Wallets\WalletEntity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Wallets\Transactions\TransactionRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TransactionController extends Controller
{
    /**
     * @var \App\Contracts\Users\Wallets\Transactions\Services\TransactionServiceInterface
     */
    private $transactionService;

    /**
     * TransactionController constructor.
     *
     * @param TransactionServiceInterface $transactionService
     */
    public function __construct(
        TransactionServiceInterface $transactionService
    ) {
        $this->transactionService = $transactionService;
    }

    /**
     * @param \App\Http\Requests\Users\Wallets\Transactions\TransactionRequest $request
     * @return JsonResponse
     */
    public function pay(TransactionRequest $request): JsonResponse
    {

        try {
            $dados = $request->getParams()->all();

            /** @var WalletEntity $entidade */
            $entidade = $this->transactionService->pay($dados);

            return response()->json(
                [
                    "codigo" => Response::HTTP_CREATED,
                    "descricao" => "Valor transferido com sucesso.",
                    "money" => $entidade,
                ],
                Response::HTTP_CREATED
            );
        } catch (\Exception $exception) {
            /** @var int $statusCode */
            $statusCode = $exception instanceof HttpException
                ? $exception->getStatusCode() : Response::HTTP_BAD_REQUEST;

            return response()->json([
                'codigo' => $statusCode,
                'descricao' => $exception->getMessage()
                                    ]);
        }
    }

    /**
     * @inheritDoc
     * return JsonResponse
     */
    public function list(): JsonResponse
    {
        try {
            /** @var \App\Entities\Users\Wallets\Transactions\TransactionEntity $colecao */
            $colecao = $this->transactionService->list();

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
