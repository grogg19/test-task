<?php

namespace App\Helpers;

/**
 * Class IpHelper
 */
class IpHelper
{
    /**
     * Метод проверяет не является ли ip-адрес из локальной сети
     *
     * @param string $ip
     *
     * @return bool
     */
    public static function isIpFromLocalRange(string $ip): bool
    {
        return in_array(explode('.', $ip)[0], [192, 172, 127, 0], true);
    }
}
