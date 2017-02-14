<?php

/*
 * All rights reserved RTGDaCoder.
 * DO NOT COPY OR PIRATE!
 */

/* Essentials */
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\CommandExecutor;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;

use RTG\CE\Loader;

/**
 * A command execution file!
 *
 * @author RTG
 */

class CECommand implements CommandExecutor {
    
    public function __construct(Loader $owner) {
        $this->owner = $owner;
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
                                $sender->sendMessage("[CE] /ce upgrade [level]");
                                
                                return true;
                            break;
                        
                            case "buy":
                                
                                $sender->sendMessage(" -- Custom Enchantments Shop -- ");
                                
                                
                                return true;
                            break;
                        
                            case "upgrade":
                                if(isset($args[1])) {
                                    
                                    $lvl = $args[1];
                                    
                                    $this->owner->onWeaponUpgrade($sender, $lvl);
                                    
                                }
                                else {
                                    $sender->sendMessage("Usage: /ce upgrade [level]");                              }
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