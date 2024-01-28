<?php

namespace App\DTO;

use App\Enums\UserTypes;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreCompanyRequest;
use Date;
use Illuminate\Http\UploadedFile;
use Illuminate\Session\Store;

class CompanyDTO {

    public string $name;
    public UploadedFile $logo;
    public int $organization_type;
    public int $industry_type;
    public int $team_size;
    public string $date;
    public string $web_site;
    public string $vision;
    public UploadedFile $banner_url;
    public string $about_us;
    public array $social_link;

    public function __construct(
        string $name,
        UploadedFile $logo,
        int $organization_type,
        int $industry_type,
        int $team_size,
        string $date,
        string $web_site,
        string $vision,
        UploadedFile $banner_url,
        string $about_us,
        string $phone,
        string $email,
        array $social_link
    ) {
        $this->name = $name;
        $this->logo = $logo;
        $this->organization_type = $organization_type;
        $this->industry_type = $industry_type;
        $this->team_size = $team_size;
        $this->date = $date;
        $this->web_site = $web_site;
        $this->vision = $vision;
        $this->banner_url = $banner_url;
        $this->about_us = $about_us;
        $this->phone = $phone;
        $this->email = $email;
        $this->social_links = $social_link;
    }

    public static function fromRequest(StoreCompanyRequest $request): CompanyDTO {
        return new static(
            $request->get('name'),
            $request->file('logo'),
            $request->get('organization_type'),
            $request->get('industry_type'),
            $request->get('team_size'),
            $request->get('year_of_establishment'),
            $request->get('web_site'),
            $request->get('vision'),
            $request->file('banner_url'),
            $request->get('about_us'),
            $request->get('phone'),
            $request->get('email'),
            $request->get('social_link', [])
        );
    }

}
