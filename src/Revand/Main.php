<?php

namespace Revand;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

use pocketmine\item\Item;
use pocketmine\item\ItemIds;
use pocketmine\nbt\CompundTag;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getLogger()->info("[Revand Mika] Jangan Rename Author");
        
        //depend
        $this->inventoryApi = $this->getServer()->getPluginManager()->getPlugin("InventoryAPI");
		$this->kdr = $this->getServer()->getPluginManager()->getPlugin("KDR");
		$this->jump = $this->getServer()->getPluginManager()->getPlugin("JumpRecord");
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        switch($cmd->getName()){
            case "stats":
                if($sender instanceof Player){
                    $this->openStats($sender);
                    
                    return true;
                }else{
                    $sender->sendMessage("Use In-Game");
                }
            break;    
        }
        return true;
    }
    
    
    //ini Menunya Bang
  public function openStats(Player $player){
    $kill = $this->kdr->getProvider()->getPlayerKillPoints($player);
    $death = $this->kdr->getProvider()->getPlayerDeathPoints($player);
    $loncat = $this->jump->getExp($player);
    $inventory = $this->inventoryApi->createChestGUI();
    $inventory->setName("§7[§l§eSans§bStats§r§7]"); 
    $inventory->setViewOnly(); 
    $inventory->setItem(0, Item::get(160, 9, 1));
    $inventory->setItem(1, Item::get(160, 9, 1));
    $inventory->setItem(2, Item::get(160, 9, 1));
    $inventory->setItem(3, Item::get(160, 9, 1));
    $inventory->setItem(4, Item::get(160, 9, 1));
    $inventory->setItem(5, Item::get(160, 9, 1));
    $inventory->setItem(6, Item::get(160, 9, 1));
    $inventory->setItem(7, Item::get(160, 9, 1));
    $inventory->setItem(8, Item::get(160, 9, 1));
    $inventory->setItem(9, Item::get(160, 9, 1));
    $kill = $this->kdr->getProvider()->getPlayerKillPoints($player);
    $inventory->setItem(10, Item::get(276, 0, 1)->setCustomName("§l§4Bunuh Player\n\n§r§e" . $kill . " Kali"));
    $inventory->setItem(11, Item::get(160, 5, 1));
    $inventory->setItem(12, Item::get(276, 0, 1)->setCustomName("§l§4Mati\n\n§r§e" . $death . " Kali"));
    $inventory->setItem(13, Item::get(160, 5, 1));
    $inventory->setItem(14, Item::get(341, 0, 1)->setCustomName("§l§eLoncat\n§r\n§e" . $loncat . " Kali"));
    $inventory->setItem(15, Item::get(160, 5, 1));
    $inventory->setItem(16, Item::get(397, 0, 1)->setCustomName("§l§eNolep\n§r\n§eComing Soon"));
    $inventory->setItem(17, Item::get(160, 9, 1));
    $inventory->setItem(18, Item::get(160, 9, 1));
    $inventory->setItem(19, Item::get(160, 9, 1));
    $inventory->setItem(20, Item::get(160, 9, 1));
    $inventory->setItem(21, Item::get(160, 9, 1));
    $inventory->setItem(22, Item::get(160, 9, 1));
    $inventory->setItem(23, Item::get(160, 9, 1));
    $inventory->setItem(24, Item::get(160, 9, 1));
    $inventory->setItem(25, Item::get(160, 9, 1));
    $inventory->setItem(26, Item::get(160, 9, 1));
    $inventory->send($player); 
  }
  }    
        
