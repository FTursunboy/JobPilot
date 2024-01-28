<?php

namespace App\DTO;

use App\Enums\UserTypes;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyRequest;
use Illuminate\Auth\Events\Login;

class VerifyDTO {

    public string $email;

    public string $code;

    public function __construct(string $email, string $code)
    {
        $this->email = $email;
        $this->code = $code;
    }


    public static function fromRequest(VerifyRequest $request) :VerifyDTO {
        return new static(
            $request->get('email'),
            $request->get('code')
        );
    }
}
