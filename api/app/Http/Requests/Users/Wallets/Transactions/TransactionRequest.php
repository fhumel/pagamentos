<?php

namespace App\Http\Requests\Users\Wallets\Transactions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionRequest extends Controller
{
    public function __construct(Request $request)
    {
        $this->validate(
            $request,
            [
                'value' => 'regex:/^\d+(\.\d{1,2})?$/',
                'payer' => 'required|integer',
                'payee' => 'required|integer',
            ]
        );

        parent::__construct($request);
    }
}
