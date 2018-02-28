<?php
namespace HMR;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\math\Vector3;

class Main extends PluginBase implements Listener{
    

    public function onEnable() {
$this->getServer()->getPluginManager()->registerEvents($this,$this);
        $this->getLogger()->info(TextFormat::BLUE . "HealthMessageReturn Enabled!");
    }

    public function onDeath(PlayerDeathEvent $event) {
   
        $cause = $event->getEntity()->getLastDamageCause();
        if($cause instanceof EntityDamageByEntityEvent) {
            $player = $event->getEntity();
            $killer = $event->getEntity()->getLastDamageCause()->getDamager();
$player->sendMessage(TextFormat::LIGHT_PURPLE.$killer->getName() . TextFormat::GOLD." §aKilled you with " .TextFormat::LIGHT_PURPLE.$killer->getHealth().TextFormat::RED." §ahearts left");
if($killer instanceof Player) {
 $killer->sendMessage(TextFormat::GREEN."§bYou Killed§3 ".$player->getName()."§b!");
				}
            }
        }

}
