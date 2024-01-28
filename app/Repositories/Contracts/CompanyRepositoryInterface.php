<?php

namespace App\Repositories\Contracts;

use App\DTO\CompanyDTO;
use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\DTO\VerifyDTO;
use App\Models\Company;
use App\Services\ImageUpload;

interface CompanyRepositoryInterface
{
    public function store(CompanyDTO $DTO) :Company;
}
