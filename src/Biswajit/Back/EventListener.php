<?php

declare(strict_types=1);

namespace Biswajit\Back;

use Biswajit\Back\Managers\CacheManager;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;

class EventListener implements Listener
{
    public function onDeath(PlayerDeathEvent $event)
    {
        $player = $event->getPlayer();

        if ($player->hasPermission("back.cmd.use")) {
            $pos = $player->getLocation();
            $x = $pos->getX();
            $y = $pos->getY();
            $z = $pos->getZ();
            $worldName = $pos->getWorld()->getFolderName();
            CacheManager::getInstance()->back[$player->getName()] = $x . ":" . $y . ":" . $z . ":" . $worldName;
        }
    }
}