<?php

namespace App\Http\Controllers\API;

use App\DTO\CompanyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller
{
    public function __construct()
    {
    }

    public function store(StoreCompanyRequest $request)
    {
        $var = CompanyDTO::fromRequest($request);

    }
}
