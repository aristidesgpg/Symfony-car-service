<?php

namespace App\Service;

/**
 * Class PasswordHelper
 * @package App\Service
 */
class PasswordHelper {
    private const ALGORITHM = PASSWORD_DEFAULT;
    private const OPTIONS = [];

    /**
     * @param string $plaintext
     *
     * @return string Password hash
     * @throws \Exception
     */
    public static function hashPassword (string $plaintext): string {
        $hash = password_hash($plaintext, self::ALGORITHM, self::OPTIONS);
        if ($hash === false) {
            throw new \Exception('Failed to hash password');
        }

        return $hash;
    }

    /**
     * @param string $plaintext
     * @param string $hash
     *
     * @return bool
     */
    public static function validatePassword (string $plaintext, string $hash): bool {
        return password_verify($plaintext, $hash);
    }

    /**
     * @param string $hash
     *
     * @return bool
     */
    public static function passwordNeedsRehash (string $hash): bool {
        return password_needs_rehash($hash, self::ALGORITHM, self::OPTIONS);
    }
}