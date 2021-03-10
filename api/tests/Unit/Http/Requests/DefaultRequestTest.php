<?php

namespace Tests\Http\Requests;

use App\Http\Requests\DefaultRequest;

/**
 * Class DefaultRequestTest
 * @package Tests\Http\Requests
 */
class DefaultRequestTest
{
    /** @var array */
    protected array $rules = [
        'cpf' => 'required|string'
    ];

    /** @var array */
    protected array $messages = [
        'cpf.required' => 'CPF não informado'
    ];
}
