<?php

namespace App\Repositories\Contracts;

use App\DTO\CompanyDTO;
use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\DTO\VerifyDTO;

interface CompanyRepositoryInterface
{
    public function store(CompanyDTO $DTO) :void;
}
