<?php

namespace RTG\CE;

/* Essentials */
use pocketmine\Plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\command\CommandExecutor;

use RTG\CE\CMD\CECommand;

class Loader extends PluginBase implements Listener {
    
    public $economy;
    
    public function onEnable() {
        $this->getServer()->registerEvents($this, $this);
        $this->getLogger()->warning("
            Starting up CE!");
        $this->getCommand("ce")->setExecutor(new CECommand($this));
        
        if($this->getServer()->getPluginManager()->getPlugin("EconomyAPI") === true) {
            
            $this->economy = $this->getServer()->getPlugin("EconomyAPI");
            
        }
        else {
            $sender->sendMessage("[CE] Please install EconomyAPI to make sure this plugin works perfectly!");
            return true; // ensures that the plugin is loaded!
        }
    }
    
    public function onDisable() {
        $this->getLogger()->warning("
                DEBUG!");
    }
     
}