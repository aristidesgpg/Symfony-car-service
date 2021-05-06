<?php

namespace App\Money;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Money\Money;

/**
 * Doctrine custom type for money.
 */
class MoneyType extends Type
{
    public const TYPE = 'money';

    public const PRECISION = 8;
    public const SCALE = 2;

    /**
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getDecimalTypeDeclarationSQL([
            'precision' => self::PRECISION,
            'scale' => self::SCALE,
        ]);
    }

    /**
     * @param mixed $value
     *
     * @return mixed|Money|null
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return (null === $value) ? null : MoneyHelper::parse($value);
    }

    /**
     * @param mixed $value
     *
     * @return mixed|string|null
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (null === $value) {
            return null;
        } elseif (!$value instanceof Money) {
            throw new \InvalidArgumentException(sprintf('Did not get instance of "%s"', Money::class));
        }

        return MoneyHelper::getFormatter()->format($value);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::TYPE;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}
