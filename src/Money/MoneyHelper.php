<?php

namespace App\Money;

use Money\Currencies;
use Money\Currencies\CurrencyList;
use Money\Currency;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Money;
use Money\MoneyFormatter;
use Money\MoneyParser;
use Money\Parser\DecimalMoneyParser;

abstract class MoneyHelper {
    /** @var MoneyParser */
    private static $parser;

    /** @var MoneyFormatter */
    private static $formatter;

    /** @var Currency */
    private static $currency;

    /** @var Currencies */
    private static $currencies;

    /**
     * @param string $number
     *
     * @return Money
     */
    public static function parse (string $number): Money {
        return self::getParser()->parse($number, self::getCurrency());
    }

    /**
     * @return MoneyParser
     */
    public static function getParser (): MoneyParser {
        if (self::$parser instanceof MoneyParser) {
            return self::$parser;
        }

        return self::$parser = new DecimalMoneyParser(self::getCurrencies());
    }

    /**
     * @return MoneyFormatter
     */
    public static function getFormatter (): MoneyFormatter {
        if (self::$formatter instanceof MoneyFormatter) {
            return self::$formatter;
        }

        return self::$formatter = new DecimalMoneyFormatter(self::getCurrencies());
    }

    /**
     * @return Currency
     */
    public static function getCurrency (): Currency {
        if (self::$currency instanceof Currency) {
            return self::$currency;
        }

        return self::$currency = new Currency('USD');
    }

    /**
     * @return Currencies
     */
    private static function getCurrencies (): Currencies {
        if (self::$currencies instanceof Currencies) {
            return self::$currencies;
        }

        return self::$currencies = new CurrencyList(['USD' => MoneyType::SCALE]);
    }
}