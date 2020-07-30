<?php

namespace DafaGamingMC\RulesUI;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

use pocketmine\utils\TextFormat as C;

class Main extends PluginBase implements Listener {

   public function onEnable(){
      $this->getLogger()->info(C:GREEN . "[ENABLE] RULES UI PLUGIN");

      @mkdir($this->getDataFolder());
      $this->saveDefaultConfig();
      $this->getResource("config.yml");
   }

   public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {

      switch($cmd-getName()){
         case "rules":
            if($sender instanceof Player){
               $this->RulesUI($player);
            }
      }
      return true;
   }
   
   public function RulesUI($player){
   $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
   $form = $api->createSimpleForm(function (Player $player, int $data = null) {
      $result = $data
      if($result === null){
          return true;
      }
      switch($result){
          case 0:

          break;
      }
   });
   $form->setTitle($this->getConfig()->get("Title"));
   $form->setContent($this->getConfig()->get("Content"));
   $form->addButton($this->getConfig()->get("button-name"));
   $form->sendToPlayer($player);
   return $form;
   }
}
