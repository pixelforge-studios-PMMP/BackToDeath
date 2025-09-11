<?php 

namespace Biswajit\Back;

use Biswajit\Back\Commands\BackCommand;
use pocketmine\plugin\PluginBase;
use Biswajit\Back\EventListener;

class Main extends PluginBase {

    /** @var array */
    private $config;

    public function onEnable(): void {
        $this->saveDefaultConfig();
        
        $this->config = $this->getConfig()->getAll();
        
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
        $this->getServer()->getCommandMap()->register("back", new BackCommand($this));
    }

    /**
     * Get the plugin configuration
     * 
     * @return array
     */
    public function getPluginConfig(): array {
        return $this->config;
    }
}
