<?php

declare(strict_types=1);

namespace Biswajit\Back;

use Biswajit\Back\sessions\Session;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerQuitEvent;

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
            $session = new Session($player);
            $session->data["back"] = $x . ":" . $y . ":" . $z . ":" . $worldName;
            $session->saveData();
        }
    }

    public function onQuit(PlayerQuitEvent $event)
    {
        $player = $event->getPlayer();
        Session::removeSession($player);
    }
}
