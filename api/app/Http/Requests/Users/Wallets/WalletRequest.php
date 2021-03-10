<?php

namespace App\Http\Requests\Users\Wallets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WalletRequest extends Controller
{
    public function __construct(Request $request)
    {
        $this->validate(
            $request,
            [
                'id' => 'integer',
                'money' => 'regex:/^\d+(\.\d{1,2})?$/',
                'type' => 'string',
            ]
        );

        parent::__construct($request);
    }
}
