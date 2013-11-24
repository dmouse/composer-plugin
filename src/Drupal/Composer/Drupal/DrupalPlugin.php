<?php

namespace Drupal\Composer\Drupal;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\CommandEvent;
use Composer\Util\RemoteFilesystem;
use Composer\Json\JsonFile;
use Composer\Installer;

class DrupalPlugin implements PluginInterface, EventSubscriberInterface {

  public function activate(Composer $composer, IOInterface $io){
    $this->composer = $composer;
    $this->io = $io;
  }

  public static function getSubscribedEvents(){
    return array(
      PluginEvents::COMMAND => array(
          array('mergeComposers', 0)
      ),
    );
  }

  public function mergeComposers(CommandEvent $event) {
    //$locker = $this->composer->getLocker();


    /*$file = new JsonFile('sites/default/files/composer.json', new RemoteFilesystem($this->io));
    $file->validateSchema(JsonFile::LAX_SCHEMA);
    $localConfig = $file->read();*/

    $factory = new \Composer\Factory();
    $composer = $factory->createComposer($this->io, './sites/default/files/composer.json');
    $localRepo = $composer->getRepositoryManager();

    $localRepo->reload();

    //$locker->getLockData();

    //print_r ($locker->getLockData());
    exit(0);
  }

}
