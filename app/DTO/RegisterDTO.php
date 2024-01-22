<?php

namespace App\DTO;

use App\Enums\UserTypes;
use App\Http\Requests\RegisterRequest;

class RegisterDTO {
    public string $name;

    public string $surname;

    public UserTypes $type;

    public string $email;

    public string $password;
    public function __construct(string $name, string $surname, UserTypes $type, string $email, string $password)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->type = $type;
        $this->email = $email;
        $this->password = $password;
    }


    public static function fromRequest(RegisterRequest $request) :RegisterDTO {
        return new static(
            $request->get('name'),
            $request->get('surname'),
            $request->get('password'),
            $request->get('email'),
            $request->get('type')
        );
    }
}
