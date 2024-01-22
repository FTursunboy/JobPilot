<?php

namespace App\Traits;

use App\Models\Translation;
use Exception;

trait HasTranslations
{
    protected $locale;

    public function translate($field, $locale = null)
    {
        if ($this->isAvailableField($field))
            return $this->getTranslationAttributes($locale)->firstWhere('field', $field)?->value;
        throw new Exception("This field is not in translatables array: $field");
    }

    protected function isAvailableField($field)
    {
        return in_array($field, $this->translatable);
    }

    public function getTranslationAttributes($locale = null)
    {
        return $this->translations->where('language', $locale ?: $this->getLocale());
    }

    public function getLocale()
    {
        return auth()->user()?->getLocale() ?: app()?->getLocale();
    }

    public function setLocale($key)
    {
        $this->locale = $key;
    }

    function pluckTranslate($field)
    {
        return $this->translates($field)->all() ? $this->translates($field)->pluck('value', 'language') : null;
    }

    public function translates($field)
    {
        if ($this->isAvailableField($field))
            return $this->translations->where('field', $field);
        throw new Exception("This field is not in translatables array: $field");
    }

    public function setTranslationsArray($array)
    {
        foreach ($array as $field => $value) {
            $this->setTranslations($field, $value);
        }
        return $this;
    }

    public function setTranslations($field, $array)
    {
        if ($this->isAvailableField($field)) {
            foreach ($array as $locale => $value) {
                $this->setTranslation($field, $value, $locale);
            }
        }
        return $this;
    }

    public function setTranslation($field, $value, $locale = null)
    {
        $this->translations()->updateOrCreate(['field' => $field, 'language' => $locale ?: $this->getLocale()], ['value' => $value]);
        if ($locale == defaultLocaleCode()) {
            $this->update([$field => $value]);
        }
        return $this;
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }
}
