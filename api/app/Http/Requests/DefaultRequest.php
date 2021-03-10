<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

/**
 * Class DefaultRequest
 *
 * @package App\Http\Requests
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
abstract class DefaultRequest
{

    /**
     * Variável para armazenar as regras
     * Example:
     * ```
     * protected array $regras = ['campo' => 'required|integer']
     * ```
     *
     * @var array
     */
    protected array $rules = [];

    /**
     * Variável para armazenar mensagens customizadas para cada regra
     *
     * Example:
     * ```
     * protected array $mensagens = ['campo' => 'required|integer']
     * ```
     *
     * @var array
     */
    protected array $messages = [];

    /**
     * Método para definição de regras
     *
     * @return array
     */
    public function rules()
    {
        return $this->rules;
    }

    /**
     * Método para retorno das mensagens customizadas
     *
     * @return array
     */
    public function messages()
    {
        return $this->messages;
    }

    /**
     * Retorno caso a validação seja inválida
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator): ValidationException
    {
        throw (
        new ValidationException(
            $validator,
            response()->json(
                [
                    'errors' => $validator->getMessageBag()->getMessages()
                ],
                Response::HTTP_BAD_REQUEST
            )
        )
        );
    }
}
