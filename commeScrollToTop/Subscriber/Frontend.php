<?php
/**
 * @copyright  Copyright (c) 2018
 * @category   
 * @author     Commerce Care
 */
namespace commeScrollToTop\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Controller_ActionEventArgs;
use Shopware\Components\Plugin\ConfigReader;

class Frontend implements SubscriberInterface
{

    private $container;
     private $config;
     private $pluginName;
    public function __construct($container) {
         $this->pluginName= "commeScrollToTop";
          $this->config = Shopware()->Container()->get('shopware.plugin.cached_config_reader')->getByPluginName('commeScrollToTop');
      
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onSecureFrontendPostDispatchForCcOnScrollTop'
        ];
    }


    public function onSecureFrontendPostDispatchForCcOnScrollTop(\Enlight_Event_EventArgs $args) {
    	$controller = $args->getSubject();
     	$view = $controller->View();
      $view->addTemplateDir($this->getPluginViewDir());
       $config = $this->config;
   
   $positionConfig = $this->calculatePosition($config);
   $showButtonFrom = $config['showbutton-from'];
   $showDesktop = $config['show-on-desktop'] == 'yes' ? 'true' : 'false';
   $showTabletLandscape = $config['show-on-tablet-landscape'] == 'yes' ? 'true' : 'false';
   $showTabletPortrait = $config['show-on-tablet-portrait'] == 'yes' ? 'true' : 'false';
   $showMobileLandscape = $config['show-on-mobile-landscape'] == 'yes' ? 'true' : 'false';
   $showMobilePortrait = $config['show-on-mobile-portrait'] == 'yes' ? 'true' : 'false';

        
   $view->assign('showDesktopArrow', $showDesktop);
   $view->assign('showTabletLandscapeArrow', $showTabletLandscape);
   $view->assign('showTabletPortraitArrow', $showTabletPortrait);
   $view->assign('showMobileLandscapeArrow', $showMobileLandscape);
   $view->assign('showMobilePortraitArrow', $showMobilePortrait);
   $view->assign('positionConfig', $positionConfig);
   $view->assign('showButtonFrom', $showButtonFrom);
   $view->assign('templateFile', $config['arrow-type']);


    }


    /**
    *  will return modified array at config settingd
    * @return array
    */

    private function calculatePosition($config)
   {
       $positionConfig = array($config['horizontal-align'] => $config['horizontal-distance'] . 'px');

       switch ($config['vertical-align']) {
           case 'middle':
               $positionConfig['top'] = '50%;';
               $positionConfig['margin-top'] = -((intval($config['button-size'], 10) + intval($config['button-margin'], 10)) / 2) . 'px';
               break;
           case 'top':
           case 'bottom':
               $positionConfig[$config['vertical-align']] = $config['vertical-distance'] . 'px';
               break;
       }

       return $positionConfig;
   }


         /**
         * @return string
         */
          private function getPluginViewDir()
          {
            return Shopware()->Container()->getParameter('comme_scroll_to_top.view_dir');
          }


}
