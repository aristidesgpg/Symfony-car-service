<?php

namespace App\Service;

/**
 * Class PasswordHelper.
 */
class PasswordHelper
{
    private const ALGORITHM = PASSWORD_DEFAULT;
    private const OPTIONS = [];

    /**
     * @return string Password hash
     *
     * @throws \Exception
     */
    public static function hashPassword(string $plaintext): string
    {
        $hash = password_hash($plaintext, self::ALGORITHM, self::OPTIONS);
        if (false === $hash) {
            throw new \Exception('Failed to hash password');
        }

        return $hash;
    }

    public static function validatePassword(string $plaintext, string $hash): bool
    {
        return password_verify($plaintext, $hash);
    }

    public static function passwordNeedsRehash(string $hash): bool
    {
        return password_needs_rehash($hash, self::ALGORITHM, self::OPTIONS);
    }
}
