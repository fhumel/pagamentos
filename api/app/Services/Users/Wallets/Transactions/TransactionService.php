<?php

namespace App\Services\Users\Wallets\Transactions;

use App\Contracts\Users\Repositories\UserRepositoryInterface;
use App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface;
use App\Contracts\Users\Wallets\Transactions\Repositories\TransactionRepositoryInterface;
use App\Contracts\Users\Wallets\Transactions\Services\TransactionServiceInterface;
use App\Models\Users\User;
use App\Models\Users\Wallets\Transactions\Transaction;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\HttpFoundation\Response;

class TransactionService implements TransactionServiceInterface
{

    /** @var TransactionRepositoryInterface */
    private $transactionRepository;

    /** @var integer */
    public const COMUM = 1;

    /** @var integer */
    public const LOGISTA = 2;
    /**
     * @var \App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface
     */
    private $walletRepository;
    /**
     * @var string
     */
    private $authorizerUri;

    /**
     * TransactionService constructor.
     *
     * @param TransactionRepositoryInterface $transactionRepository
     * @param WalletRepositoryInterface $walletRepository
     * @param string                                              $authorizerUri
     */
    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        WalletRepositoryInterface $walletRepository,
        string $authorizerUri
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->walletRepository = $walletRepository;
        $this->authorizerUri = $authorizerUri;
    }

    /**
     * @inheritDoc
     */
    public function authorize(): bool
    {

        $client = new Client();

        $response = $client->request('GET', env('AUTHORIZER'));

        $statusCode = \GuzzleHttp\json_encode($response->getStatusCode());

        if (!$statusCode == Response::HTTP_OK) {
            return false;
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function payment(): bool
    {

        $client = new Client();

        $response = $client->request('GET', env('PAYMENT'));

        $statusCode = \GuzzleHttp\json_encode($response->getStatusCode());

        if (!$statusCode == Response::HTTP_OK) {
            return false;
        }

        return true;
    }

    public function validate(int $userPayer): bool
    {
        $userPayer = User::find($userPayer);

        if ($userPayer->type === UserRepositoryInterface::LOGISTA) {
                abort(
                    \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST,
                    'Não é possivel tranferir dinheiro com sendo tipo logista.'
                );
        }


        if (!$this->authorize()) {
                abort(
                    \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST,
                    'Serviço não Autorizado.'
                );
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function pay(array $dados): Transaction
    {

        $value = $dados['value'];
        $payer = $dados['payer'];
        $payee = $dados['payee'];

        return DB::transaction(function () use ($value, $payer, $payee, $dados) {

            $this->validate($payer);

            /** @var WalletRepositoryInterface $payee */
            $this->walletRepository->withdrawn(
                ['id' => $payer, 'money' => $value]
            );

            /** @var WalletRepositoryInterface $payee */
            $this->walletRepository->deposit(
                ['id' => $payee, 'money' => $value]
            );

            if (!$this->payment()) {
                abort(
                    \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST,
                    'Serviço de pagamento indeiponível.'
                );
            }

            return $this->transactionRepository->pay($dados);
        });
    }

    /**
     * @inheritDoc
     */
    public function list(): array
    {
        return $this->transactionRepository->list();
    }
}
