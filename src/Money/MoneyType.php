<?php

namespace App\Money;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Money\Money;

/**
 * Doctrine custom type for money
 */
class MoneyType extends Type {
    public const TYPE = 'money';

    public const PRECISION = 8;
    public const SCALE     = 2;

    /**
     * @param array            $fieldDeclaration
     * @param AbstractPlatform $platform
     *
     * @return string
     */
    public function getSQLDeclaration (array $fieldDeclaration, AbstractPlatform $platform) {
        return $platform->getDecimalTypeDeclarationSQL([
            'precision' => self::PRECISION,
            'scale'     => self::SCALE,
        ]);
    }

    /**
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return mixed|Money|null
     */
    public function convertToPHPValue ($value, AbstractPlatform $platform) {
        return ($value === null) ? null : MoneyHelper::parse($value);
    }

    /**
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return mixed|string|null
     */
    public function convertToDatabaseValue ($value, AbstractPlatform $platform) {
        if ($value === null) {
            return null;
        } elseif (!$value instanceof Money) {
            throw new \InvalidArgumentException(sprintf('Did not get instance of "%s"', Money::class));
        }

        return MoneyHelper::getFormatter()->format($value);
    }

    /**
     * @return string
     */
    public function getName () {
        return self::TYPE;
    }
}