<?php

namespace Biswajit\Back\sessions;

use pocketmine\player\Player;

class Session {

    private Player $player;
    use SessionData;

    public function __construct(Player $player) {
        $this->player = $player;
        $this->loadData();
    }

    public function getPlayer(): Player {
        return $this->player;
    }
}
