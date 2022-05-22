<?php

namespace App\Services;

use App\Models\Currency;

class CurrencyService
{
    private const EXTERNAL_API = 'http://www.cbr.ru/scripts/XML_daily.asp';

    public static function fetchCurrencies()
    {
        $parsedCurrencies = json_decode((new self)->fetchData(), true);
        $currencies = [];
        foreach ($parsedCurrencies['Valute'] as $parsedCurrency) {
            $currencies[] = [
                'name' => $parsedCurrency['Name'],
                'rate' => (float) $parsedCurrency['Value'] / (int) $parsedCurrency['Nominal']
            ];
        }
        Currency::upsert($currencies, ['name'], ['rate']);
    }

    /**
     * @return string
     */
    private function fetchData(): string
    {
        $xmlDataString = file_get_contents(self::EXTERNAL_API);
        $xmlObject = simplexml_load_string($xmlDataString);

        return json_encode($xmlObject);
    }
}
