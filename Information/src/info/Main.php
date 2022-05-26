<?php

namespace info;

use pocketmine\Server;
use pocketmine\player\Player;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\Plugin;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {

    public Config $config;

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("The Information Plugin has been activated");
    }

    public function onDisable(): void {
        $this->getLogger()->info("The Information Plugin has been deactivated");
    }

    public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {

        switch ($cmd->getName()) {
            case "dc":
                  if($sender instanceof Player){
                      $sender->sendMessage($this->getConfig()->get("discord-message"));
                  } else {
                      $sender->sendMessage("You have no rights to execute the command");
                  }
                  break;
            case "yt":
                if($sender instanceof Player){
                $sender->sendMessage($this->getConfig()->get("youtube-message"));
                } else {
                $sender->sendMessage("You have no rights to execute the command");
                }
            break;
            case "tiktok":
                if($sender instanceof Player){
                    $sender->sendMessage($this->getConfig()->get("tiktok-message"));
                } else {
                    $sender->sendMessage("You have no rights to execute the command");
                }
                break;
      }
        return true;
    }
}