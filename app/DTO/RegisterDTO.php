<?php

namespace App\DTO;

use App\Enums\UserTypes;
use App\Http\Requests\RegisterRequest;

class RegisterDTO {
    public string $name;

    public string $surname;

    public string $type;

    public string $email;

    public string $password;

    public string $username;
    public function __construct(string $name, string $surname,  string $type,  string $email, string $password, string $username)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->type = $type;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }


    public static function fromRequest(RegisterRequest $request) :RegisterDTO {
        return new static(
            $request->get('name'),
            $request->get('surname'),
            $request->get('type'),
            $request->get('email'),
            $request->get('password'),
            $request->get('username')
        );
    }
}
