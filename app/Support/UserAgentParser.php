<?php

namespace App\Support;

/**
 * Lightweight user-agent parser (no extra dependency).
 * Good enough for audit purposes; the raw user agent is always stored too.
 */
class UserAgentParser
{
    public static function parse(?string $ua): array
    {
        $ua = (string) $ua;

        $result = [
            'device_type' => 'desktop',
            'device_brand' => null,
            'browser' => null,
            'browser_version' => null,
            'os' => null,
            'os_version' => null,
        ];

        if ($ua === '') {
            $result['device_type'] = null;

            return $result;
        }

        // Bots
        if (preg_match('/bot|crawl|spider|slurp|curl|wget|python-requests|httpclient|postman/i', $ua)) {
            $result['device_type'] = 'bot';
        }

        // OS
        $osMap = [
            'Windows' => '/Windows NT ([\d.]+)/',
            'Android' => '/Android ([\d.]+)/',
            'iOS' => '/(?:iPhone|CPU) OS ([\d_]+)/',
            'macOS' => '/Mac OS X ([\d_.]+)/',
            'Linux' => '/Linux/',
        ];
        foreach ($osMap as $name => $regex) {
            if (preg_match($regex, $ua, $m)) {
                $result['os'] = $name;
                $result['os_version'] = isset($m[1]) ? str_replace('_', '.', $m[1]) : null;
                break;
            }
        }
        if ($result['os'] === 'Windows' && $result['os_version']) {
            $result['os_version'] = match ($result['os_version']) {
                '10.0' => '10/11', '6.3' => '8.1', '6.2' => '8', '6.1' => '7', default => $result['os_version'],
            };
        }

        // Device type / brand
        if ($result['device_type'] !== 'bot') {
            if (preg_match('/iPad|Tablet|Android(?!.*Mobile)/i', $ua)) {
                $result['device_type'] = 'tablet';
            } elseif (preg_match('/Mobi|iPhone|Android/i', $ua)) {
                $result['device_type'] = 'mobile';
            }
        }
        $brands = [
            'Apple' => '/iPhone|iPad|Macintosh/',
            'Samsung' => '/SM-[A-Z0-9]+|Samsung/i',
            'Huawei' => '/Huawei|HONOR|HUAWEI/i',
            'Xiaomi' => '/Xiaomi|Redmi|POCO|MI \d/i',
            'Google' => '/Pixel/',
            'OnePlus' => '/OnePlus/i',
            'Oppo' => '/OPPO|CPH\d+/i',
        ];
        foreach ($brands as $brand => $regex) {
            if (preg_match($regex, $ua)) {
                $result['device_brand'] = $brand;
                break;
            }
        }

        // Browser (order matters: Edge/Opera/Samsung contain "Chrome")
        $browsers = [
            'Edge' => '/Edg(?:e|A|iOS)?\/([\d.]+)/',
            'Opera' => '/(?:OPR|Opera)\/([\d.]+)/',
            'Samsung Internet' => '/SamsungBrowser\/([\d.]+)/',
            'Firefox' => '/(?:Firefox|FxiOS)\/([\d.]+)/',
            'Chrome' => '/(?:Chrome|CriOS)\/([\d.]+)/',
            'Safari' => '/Version\/([\d.]+).*Safari/',
            'Internet Explorer' => '/(?:MSIE |rv:)([\d.]+).*Trident|MSIE ([\d.]+)/',
        ];
        foreach ($browsers as $name => $regex) {
            if (preg_match($regex, $ua, $m)) {
                $result['browser'] = $name;
                $result['browser_version'] = $m[1] ?: ($m[2] ?? null);
                break;
            }
        }

        return $result;
    }
}
