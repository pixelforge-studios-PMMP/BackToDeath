<?php

declare(strict_types=1);

namespace Biswajit\Back\Managers;

use pocketmine\utils\SingletonTrait;

class CacheManager
{
    use SingletonTrait;

    public array $back = [];
    public array $cooldown = [];

    public function __construct()
    {
        self::setInstance($this);
    }
}