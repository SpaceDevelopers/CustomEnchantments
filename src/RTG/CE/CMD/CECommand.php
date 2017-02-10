<?php

/* Essentials */
use pocketmine\Plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\command\CommandExecutor;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;

use RTG\CE\Loader;

/**
 * Description of CECommand
 *
 * @author RTG
 */

class CECommand implements CommandExecutor {
    
    public $plugin;
    
    public function __construct(Loader $plugin) {
        $this->plugin; $plugin;
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, string $args) {
        switch(strtolower($command->getName())) {
            
            case "ce":
                if($sender->hasPermission("ce.command")) {
                    
                    if(isset($args[0])) {
                        switch(strtolower($args[0])) {
                           
                            case "help":
                                
                                $sender->sendMessage(" -- Custom Enchantments v1 --");
                                $sender->sendMessage(" "); // for an empty line :D
                                $sender->sendMessage("[CE] /ce buy - Purchase!");
                                
                                return true;
                            break;
                            
                            // WIP
                        // By IG
                            
                            
                        }
                    }
                    else {
                        $sender->sendMessage(TF::GREEN . "[CE] /ce help");
                    }
                }
                else {
                    $sender->sendMessage(TF::RED . "You have no permission to use this command!");
                }
                return true;
            break;
        }
    } 
}