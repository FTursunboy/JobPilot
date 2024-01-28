<?php

namespace App\Http\Controllers\API;

use App\DTO\CompanyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    use ApiResponse;


    public function __construct(public CompanyRepositoryInterface $repository)
    {
    }

    public function store(StoreCompanyRequest $request) :JsonResponse
    {
       return $this->success($this->repository->store(CompanyDTO::fromRequest($request)));

    }
}
