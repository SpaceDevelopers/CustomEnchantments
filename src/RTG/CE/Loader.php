<?php

namespace RTG\CE;

/* Essentials */
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\command\CommandExecutor;

use pocketmine\utils\TextFormat as TF;

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
    
    public function callMoney() {
        if($this->getServer()->getPluginManager()->getPlugin("EconomyAPI") == false) {
            $this->getLogger()->warning(" This feature won't work properly. Disabling Plugin");
            $this->setEnabled(false);
        }
        else {
            return $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
        }
    }
    
    public function onHurt(\pocketmine\event\entity\EntityDamageEvent $e) {
        
        $entity = $e->getEntity();
        $cause = $e->getCause();
            
            if($e instanceof \pocketmine\event\entity\EntityDamageByEntityEvent) {
                
                
                $damager = $e->getDamager();
                $hand = $damager->getInventory()->getItemInHand();
                
                    if(!$hand->hasEnchantments()) return false;
                    
                        if($hand->hasEnchantments(100)) {
                            
                            // WIP
                            
                            
                        }
                
                
            }
        
        
        
    }
    
    public function opSword(Player $p) {
        
        $item = \pocketmine\entity\Item::get(\pocketmine\item\Item::DIAMOND_SWORD);
        $item->addEnchantment(\pocketmine\item\enchantment\Enchantment::getEnchantment(13));
        $get = $item->getLevel();
        $item->setCustomName(TF::RED . "OP SWORD");
        $p->getInventory()->addItem($item);
        
    }
    
    public function onWeaponUpgrade(Player $p, $n) {
        
        $hand = $p->getInventory()->getItemInHand();
        $name = $hand->getCustomName();
        $type = $hand->getId();
        $lvl = (int) $n;
        $wlvl = $hand->getLevel();
        
        if($lvl < $wlvl) { // Level checker
            $p->sendMessage("You can't downgrade a weapon!");
            return false;
        }
            
            switch($lvl) {
                
                case "1":
                    
                    $newItem = \pocketmine\entity\Item::get(\pocketmine\entity\Item::$type);
                    $newItem->setLevel(1);
                    $newItem->setCustomName($name . "\n I");
                    $p->getInventory()->setItemInHand($newItem);
                    $p->sendMessage("You weapon has been upgraded to Level: 1");
                    
                    return true;
                break;
                 
            } 
    }
                    
    public function onDisable() {
        $this->getLogger()->warning("
                DEBUG!");
    }
     
}