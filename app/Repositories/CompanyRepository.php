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
use App\Services\ImageUpload;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use PhpParser\Builder\Class_;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function __construct(public ImageUpload $imageUpload)
    {
    }

    public function store(CompanyDTO $dto): Company
    {
        return Company::query()->create([
            'name' => $dto->name,
            'email' => $dto->email,
            'phone' => $dto->phone,
            'team_size' => $dto->team_size,
            'vision' => $dto->vision,
            'about_us' => $dto->about_us,
            'industry_type_id' => $dto->industry_type,
            'organization_type_id' => $dto->organization_type,
            'web_site' => $dto->web_site,
            'social_link' => json_encode($dto->social_links),
            'user_id' => Auth::id(),
            'year_of_establishment' => $dto->date,
            'logo_url' => 'storage/' . $this->imageUpload->upload($dto->logo, 'company'),
            'banner_url' => 'storage/' . $this->imageUpload->upload($dto->banner_url, 'company')

        ]);
    }
}
