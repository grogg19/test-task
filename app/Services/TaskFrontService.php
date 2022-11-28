<?php

namespace App\Services;

use Illuminate\Support\Arr;

/**
 * Логика третьего задания
 */
class TaskFrontService
{
    /**
     * Сервис геолокации
     *
     * @var GeoLocationService
     */
    public GeoLocationService $geoLocationService;

    /**
     * Номера телефонов для примера
     */
    public const PHONE_NUMBERS = [
        'Moscow'        => '8-800-123-45-67',
        'St Petersburg' => '8-800-234-56-78',
        'Sochi'         => '8-800-345-67-89',
    ];

    public const CITY_DEFAULT = 'Moscow';

    /**
     * @param GeoLocationService $geoLocationService
     */
    public function __construct(GeoLocationService $geoLocationService)
    {
        $this->geoLocationService = $geoLocationService;
    }

    /**
     * Метод возвращает номер телефона подразделения в текущем городе
     *
     * @return string
     */
    public function getPhoneNumberByCity(): string
    {
        $city = $this->geoLocationService->getCity();

        if (Arr::exists(self::PHONE_NUMBERS, $city)) {
            return self::PHONE_NUMBERS[$city];
        }

        // Если город не определен, возвращается номер телефона города по умолчанию
        return self::PHONE_NUMBERS[self::CITY_DEFAULT];
    }

}
