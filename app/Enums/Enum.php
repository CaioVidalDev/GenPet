<?php

namespace App\Enums;

trait Enum
{

    public function label(): string
    {

        $class_name = class_basename(static::class);

        return "$this->value";
        
    }

    public function transLabel(): string
    {

        return trans($this->label());
        
    }

    public static function names(): array
    {
        return array_map(fn($enum) => $enum->name, static::cases());
    }

    public static function values(): array
    {
        return array_map(fn($enum) => $enum->value, static::cases());
    }

    public static function array(): array
    {
        return array_combine(static::names(), static::values());
    }

    public static function selectArray(): array
    {
        return array_map(fn($enum) => ['label' => $enum->label(), 'value' => $enum->value], static::cases());
    }

    public static function selectTranslatedArray(): array
    {
        return array_map(fn($enum) => ['label' => trans($enum->label()), 'value' => $enum->value], static::cases());
    }

    public static function selectMaryUiArray(): array
    {
        return array_map(fn($enum) => ['name' => trans($enum->label()), 'id' => $enum->value], static::cases());
    }


    public static function fromValue(string|int $value)
    {
        return collect(static::cases())->first(fn($enum, int $key) => $enum->value == $value);
    }

}
