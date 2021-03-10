<?php

namespace App\Http\Requests\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRequest extends Controller
{
    public function __construct(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:200',
                'cpf' => 'required|string|unique:users,cpf|max:14',
                'email' => 'required|email|string|unique:users,email|max:150',
                'type' => 'required|string'
            ]
        );

        parent::__construct($request);
    }
}
