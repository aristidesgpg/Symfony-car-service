<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SettingsRepository")
 */
class Settings {
    /**
     * @ORM\Id
     * @ORM\Column(name="setting_key", type="string", length=255)
     */
    private $key;

    /**
     * @ORM\Column(name="setting_value", type="text", nullable=true)
     */
    private $value;

    /**
     * Settings constructor.
     *
     * @param string      $key
     * @param string|null $value
     */
    public function __construct (string $key, ?string $value = null) {
        $this->key   = $key;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getKey (): string {
        return $this->key;
    }

    /**
     * @return string|null
     */
    public function getValue (): ?string {
        return $this->value;
    }

    /**
     * @param string|null $value
     */
    public function setValue (?string $value): void {
        $this->value = $value;
    }
}
