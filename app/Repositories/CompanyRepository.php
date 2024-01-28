<?php

namespace App\Repositories;

use App\DTO\CompanyDTO;
use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\DTO\VerifyDTO;
use App\Jobs\SendVirificationEmail;
use App\Models\Company;
use App\Models\User;
use App\Repositories\Contracts\AuthRepositoryInterface;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use PhpParser\Builder\Class_;

class CompanyRepository implements CompanyRepositoryInterface
{

    public function store(CompanyDTO $DTO): void
    {
        Company::query()->create([
            ''
        ]);
    }
}
