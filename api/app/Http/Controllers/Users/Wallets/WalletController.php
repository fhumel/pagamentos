<?php

namespace App\Http\Controllers\Users\Wallets;

use App\Contracts\Users\Wallets\Services\WalletServiceInterface;
use App\Entities\Users\Wallets\WalletEntity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Wallets\WalletRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class WalletController extends Controller
{
    /**
     * @var \App\Contracts\Users\Wallets\Services\WalletServiceInterface
     */
    private WalletServiceInterface $walletService;

    /**
     * TransferController constructor.
     *
     * @param WalletServiceInterface $walletService
     */
    public function __construct(
        WalletServiceInterface $walletService
    ) {
        $this->walletService = $walletService;
    }

    /**
     * @param \App\Http\Requests\Users\Wallets\WalletRequest $request
     * @return JsonResponse
     */
    public function deposit(WalletRequest $request): JsonResponse
    {

        try {
            $dados = $request->getParams()->all();

            $entidade = $this->walletService->deposit($dados);

            return response()->json(
                [
                    "codigo" => Response::HTTP_CREATED,
                    "descricao" => "Valor depositado com sucesso.",
                    "money" => $entidade->getMoney(),
                    "tranferId" => $entidade->getId(),
                ],
                Response::HTTP_CREATED
            );
        } catch (\Exception $exception) {
            /** @var int $statusCode */
            $statusCode = $exception instanceof HttpException
                ? $exception->getStatusCode() : Response::HTTP_BAD_REQUEST;

            return response()->json([
                'codigo' => $statusCode,
                'descricao' => 'Não foi possível fazer a transferencia no momento.']);
        }
    }

    /**
     * /**
     * @param \App\Http\Requests\Users\Wallets\WalletRequest $request
     * @return JsonResponse
     */
    public function balance(WalletRequest $request): JsonResponse
    {
        try {
            $dados = $request->getParams()->all();

            /** @var WalletEntity $entidade */
            $entidade = $this->walletService->balance($dados);

            return response()->json(
                [
                    "codigo" => Response::HTTP_FOUND,
                    "descricao" => "Carteira listada com sucesso.",
                    "wallet" => $entidade,
                ],
                Response::HTTP_FOUND
            );
        } catch (\Exception $exception) {
            /** @var int $statusCode */
            $statusCode = $exception instanceof HttpException
                ? $exception->getStatusCode() : Response::HTTP_BAD_REQUEST;

            return response()->json([
                'codigo' => $statusCode,
                'descricao' => 'Não foi possível obter a carteira solicitada.']);
        }
    }
}
