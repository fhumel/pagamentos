<?php

namespace App\Mappers\Users\Wallets\Transactions;

use App\Contracts\Users\Wallets\Transactions\Mappers\TransactionMapperInterface;
use App\Entities\Users\Wallets\Transactions\TransactionEntity;

class TransactionMapper implements TransactionMapperInterface
{
    /** @var TransactionEntity */
    private TransactionEntity $transactionEntity;

    /**
     * TransactionMapper constructor.
     * @param TransactionEntity $transactionEntity
     */
    public function __construct(TransactionEntity $transactionEntity)
    {
        $this->transactionEntity = $transactionEntity;
    }

    /**
     * @param array $dados
     * @return TransactionEntity
     */
    public function map(array $dados): TransactionEntity
    {
        $transactionEntity = clone $this->transactionEntity;
        isset($dados['id']) ? $transactionEntity->setId($dados['id']) : $transactionEntity->setId(null);
        $transactionEntity
            ->setValue($dados['value'])
            ->setPayer($dados['payer'])
            ->setPayee($dados['payee']);
        return $transactionEntity;
    }

    /**
     * @param TransactionEntity $transactionEntity
     * @return array
     */
    public function revert(TransactionEntity $transactionEntity): array
    {
        return [
            'id' => $transactionEntity->getId(),
            'value' => $transactionEntity->getValue(),
            'payer' => $transactionEntity->getPayer(),
            'setPayee' => $transactionEntity->GetPayee()
        ];
    }
}
