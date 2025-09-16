<?php

declare(strict_types=1);

namespace Biswajit\Back\Commands;

use Biswajit\Back\Main;
use Biswajit\Back\sessions\Session;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\world\Position;

class BackCommand extends Command
{
    /** @var Main */
    private $plugin;

    public function __construct(Main $plugin) {
        parent::__construct("back", "Teleport you to the last death position", "/back");
        $this->setPermission("backtodeath.cmd");
        $this->plugin = $plugin;
    }
   public function execute(CommandSender $sender, string $commandLabel, array $args): void {
        $config = $this->plugin->getPluginConfig();
        
        if (!$sender instanceof Player) {
            $sender->sendMessage($config['messages']['console_only']);
            return;
        }

        $session  = new Session($sender);

        if(!$sender->hasPermission("back.cmd.use")) {
            $sender->sendMessage($config['messages']['no_permission']);
            return;
        }

        if(isset($session->data["cooldown"]) && $session->data["cooldown"] - time() > 0){
            $sender->sendMessage($config['messages']['on_cooldown']);
            return;
        }

        if(!isset($session->data["back"])){
            $sender->sendMessage($config['messages']['no_death']);
            return;
        }

        $pos = explode(":", $session->data["back"]);
        $worldName = $pos[3];
        $worldMgr = Server::getInstance()->getWorldManager();
        if (!$worldMgr->isWorldLoaded($worldName)){
            $worldMgr->loadWorld($worldName);
        }
        $pos = new Position((int)$pos[0], (int)$pos[1], (int)$pos[2], $worldMgr->getWorldByName($worldName));
        $sender->teleport($pos);

        $session->data["cooldown"] = time() + $config['cooldown']['time'];
        $session->saveData();

        $sender->sendMessage($config['messages']['success']);
    }
}
