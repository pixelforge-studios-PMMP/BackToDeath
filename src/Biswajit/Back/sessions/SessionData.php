<?php

declare(strict_types=1);

namespace Biswajit\Back\sessions;

use pocketmine\player\Player;

trait SessionData
{
    private static array $sessions = [];

    public array $data = [];

    public function loadData(): void {
        $key = $this->player->getUniqueId()->toString();
        if (isset(self::$sessions[$key])) {
            $this->data = self::$sessions[$key];
        }
    }

    public function saveData(): void {
        $key = $this->player->getUniqueId()->toString();
        self::$sessions[$key] = $this->data;
    }

    public static function removeSession(Player $player): void {
        $key = $player->getUniqueId()->toString();
        unset(self::$sessions[$key]);
    }
}
