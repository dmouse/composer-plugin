<?php

namespace Drupal\Composer;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PreFileDownloadEvent;

class DrupalPlugin implements PluginInterface, EventSubscriberInterface {

  public function activate(Composer $composer, IOInterface $io){
    $this->composer = $composer;
    $this->io = $io;
  }

  public static function getSubscribedEvents(){
    return array(
      PluginEvents::PRE_FILE_DOWNLOAD => array(
          array('onPreFileDownload', 0)
      ),
    );
  }

  public function onPreFileDownload(PreFileDownloadEvent $event) {
    $protocol = parse_url($event->getProcessedUrl(), PHP_URL_SCHEME);
    print_r( $protocol);
  }

}
