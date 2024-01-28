<?php

namespace App\DTO;

use App\Enums\UserTypes;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreCompanyRequest;
use Date;
use Illuminate\Session\Store;

class CompanyDTO {

    public string $name;
    public string $logo;
    public int $organization_type;
    public int $industry_type;
    public int $team_size;
    public Date $date;
    public string $website;
    public string $longText;
    public string $banner_url;
    public string $about_us;
    public array $social_links;

    public function __construct(
        string $name,
        string $logo,
        int $organization_type,
        int $industry_type,
        int $team_size,
        Date $date,
        string $website,
        string $longText,
        string $banner_url,
        string $about_us,
        string $phone,
        string $email,
        array $social_links
    ) {
        $this->name = $name;
        $this->logo = $logo;
        $this->organization_type = $organization_type;
        $this->industry_type = $industry_type;
        $this->team_size = $team_size;
        $this->date = $date;
        $this->website = $website;
        $this->longText = $longText;
        $this->banner_url = $banner_url;
        $this->about_us = $about_us;
        $this->phone = $phone;
        $this->email = $email;
        $this->social_links = $social_links;
    }

    public static function fromRequest(StoreCompanyRequest $request): CompanyDTO {
        return new static(
            $request->get('name'),
            $request->get('logo'),
            $request->get('organization_type'),
            $request->get('industry_type'),
            $request->get('team_size'),
            $request->get('year_of_establishment'),
            $request->get('website'),
            $request->get('vision'),
            $request->get('banner'),
            $request->get('about_us'),
            $request->get('phone'),
            $request->get('email'),
            $request->get('social_links', [])
        );
    }

}
