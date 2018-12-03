<?php
/**
 * @copyright  Copyright (c) 2018
 * @category   
 * @author     Commerce Care
 */
namespace commeScrollToTop\Subscriber;


use \Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Enlight\Event\SubscriberInterface;


class Javascript implements SubscriberInterface {

  private $container;

  public function __construct(ContainerInterface $container) {
    $this->container = $container;
  }

  public static function getSubscribedEvents() {

    return [
            'Theme_Compiler_Collect_Plugin_Javascript' =>  array('addJsFiles',100)
        ];
  }

 /**
     * Provide the needed javascript files
     *
     * @param \Enlight_Event_EventArgs $args
     * @return ArrayCollection
     */
    public function addJsFiles(\Enlight_Event_EventArgs $args)
    {
        $jsPath = [

          $this->getPluginViewDir(). 'frontend/_public/src/js/ccscrolltotop.js'
        ];
        return new ArrayCollection($jsPath);
    }


     /**
     * @return string
     */
      private function getPluginViewDir()
      {
        return Shopware()->Container()->getParameter('comme_scroll_to_top.view_dir');
      }

    }
