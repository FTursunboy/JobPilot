<?php

namespace App\DTO;

use App\Enums\UserTypes;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Login;

class LoginDTO {

    public string $email;

    public string $password;
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }


    public static function fromRequest(LoginRequest $request) :LoginDTO {
        return new static(
            $request->get('name'),
            $request->get('surname')
        );
    }
}
