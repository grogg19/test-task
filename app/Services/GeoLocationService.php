<?php

namespace App\Services;

use App\Helpers\IpHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * Class GeoLocationService
 */
class GeoLocationService
{

    public const GEO_LOCATION_URL = 'http://ip-api.com/json/'; // Адрес API сервиса геолокации

    /**
     * IP клиента
     *
     * @var string|null
     */
    public ?string $ip;

    /**
     * Объект, возвращаемый сервисом геолокации
     *
     * @var object
     */
    public object $geoLocationDataObject;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->ip                    = $request->ip();
        $this->geoLocationDataObject = $this->getGeoLocationByIp();
    }

    /**
     * Возвращает объект геолокации по IP
     *
     * @return object
     */
    private function getGeoLocationByIp(): object
    {
        $url = IpHelper::isIpFromLocalRange($this->ip) ? self::GEO_LOCATION_URL . $this->ip : self::GEO_LOCATION_URL;

        return Http::acceptJson()->get($url)->object();
    }

    /**
     * Возвращает свойство city
     *
     * @return string|null
     */
    public function getCity(): string|null
    {
        return $this->geoLocationDataObject->city;
    }

}
