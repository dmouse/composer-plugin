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

    $file = new JsonFile('/home/dmouse/public_html/vms/RpzAUX/www/sample/composer.json');
    $drupal_composer_json = $file->read();

    print_r($drupal_composer_json);

    $file = new JsonFile('/home/dmouse/public_html/vms/RpzAUX/www/sample/composer.lock');
    $drupal_composer_lock = $file->read();

    /*foreach ($drupal_composer_lock['packages'] as $key => $value) {

    }*/

  }

}
