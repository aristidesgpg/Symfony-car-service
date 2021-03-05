<?php

namespace App\Money;

use InvalidArgumentException;
use Money\Currencies;
use Money\Currencies\CurrencyList;
use Money\Currency;
use Money\Exception\ParserException;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Money;
use Money\MoneyFormatter;
use Money\MoneyParser;
use Money\Parser\DecimalMoneyParser;

abstract class MoneyHelper
{
    /** @var MoneyParser */
    private static $parser;

    /** @var MoneyFormatter */
    private static $formatter;

    /** @var Currency */
    private static $currency;

    /** @var Currencies */
    private static $currencies;

    public static function getFormatter(): MoneyFormatter
    {
        if (self::$formatter instanceof MoneyFormatter) {
            return self::$formatter;
        }

        return self::$formatter = new DecimalMoneyFormatter(self::getCurrencies());
    }

    private static function getCurrencies(): Currencies
    {
        if (self::$currencies instanceof Currencies) {
            return self::$currencies;
        }

        return self::$currencies = new CurrencyList(['USD' => MoneyType::SCALE]);
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function parseAmount(?string $amount): Money
    {
        try {
            $money = MoneyHelper::parse($amount);
        } catch (ParserException $e) {
            throw new InvalidArgumentException('Invalid format', 0, $e);
        }

        if ($money->isNegative() || $money->isZero()) {
            throw new InvalidArgumentException('Must be greater than zero');
        }

        return $money;
    }

    public static function parse(string $number): Money
    {
        return self::getParser()->parse($number, self::getCurrency());
    }

    public static function getParser(): MoneyParser
    {
        if (self::$parser instanceof MoneyParser) {
            return self::$parser;
        }

        return self::$parser = new DecimalMoneyParser(self::getCurrencies());
    }

    public static function getCurrency(): Currency
    {
        if (self::$currency instanceof Currency) {
            return self::$currency;
        }

        return self::$currency = new Currency('USD');
    }
}
