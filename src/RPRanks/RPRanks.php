<?php

namespace RPRanks;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;

use pocketmine\Player;

use pocketmine\command\CommandSender;

use pocketmine\Server;

use jojoe77777\FormAPI;

use pocketmine\command\Command;

class RPRanks extends PluginBase implements Listener{
    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents(($this), $this);
        $this->getLogger()->info("RPRankForm enabled");
    }

    public function onDisable(): void{
        $this->getLogger()->info("RPRankForm disabled");
    }

    public function checkDepends(): void{
        $this->formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        if(is_null($this->formapi)){
            $this->getLogger()->error("RPRankForm Requires FormAPI To Work");
            $this->getPluginLoader()->disablePlugin($this);
        }
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
        if($cmd->getName() == "rpranks"){
            if(!($sender instanceof Player)){
                return true;
            }

            $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
            $form = $api->createSimpleForm(function (Player $sender, $data){
                $result = $data;
                if ($result == null) {
                }

                switch ($result) {
                    case 0:
                        break;
                }

            });
            $form->setTitle("Enter Your RP Rank");
            $form->setContent("Enter Your RP Rank Here:");
            $form->addInput("RP Rank");
            $form->addButton("Confirm");
            $form->sendToPlayer($sender);
        }

        return true;
    }

}
