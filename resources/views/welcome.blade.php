<?php

class RegisterUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}
}

$dto = new RegisterUserDTO(
    name: 'John Doe',
    email: 'a@b.com',
    password: 'password',
);

echo $dto->name;
echo $dto->email;
echo $dto->password;