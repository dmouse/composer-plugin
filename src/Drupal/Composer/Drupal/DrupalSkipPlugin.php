<?php

namespace Drupal\Composer\Drupal;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\CommandEvent;
use Composer\Util\RemoteFilesystem;
use Composer\Config\JsonConfigSource;
use Composer\Json\JsonFile;
use Composer\Installer;

class DrupalSkipPlugin implements PluginInterface, EventSubscriberInterface {

  public function activate(Composer $composer, IOInterface $io){
    $this->composer = $composer;
    $this->io = $io;
  }

  public static function getSubscribedEvents(){
    return array(
      PluginEvents::PRE_FILE_DOWNLOAD => array(
          array('drupalSkip', 0)
      ),
    );
  }

  public function drupalSkip(PreFileDownloadEvent $event){
    print_r($event);
  }

}
