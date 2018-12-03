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
use Shopware\Components\Theme\LessDefinition;

class LessSubscriber implements SubscriberInterface {

    private $container;
    private $config;
    public function __construct(ContainerInterface $container) {

        $this->container = $container;
        $this->config = Shopware()->Container()->get('shopware.plugin.cached_config_reader')->getByPluginName('commeScrollToTop');
    }

    public static function getSubscribedEvents() {

        return [
            'Theme_Compiler_Collect_Plugin_Less' =>  'addLessFiles'
        ];
    }

    /**
     * Provide the needed less files
     *
     * @param \Enlight_Event_EventArgs $args
     * @return ArrayCollection
     */
    public function addLessFiles(\Enlight_Event_EventArgs $args)
    {
        $dir =$this->getPluginViewDir();
        $config = $this->config;

        $showDesktop = $config['show-on-desktop'] == 'yes' ? 'block' : 'none';
        $showTabletLandscape = $config['show-on-tablet-landscape'] == 'yes' ? 'block' : 'none';
        $showTabletPortrait = $config['show-on-tablet-portrait'] == 'yes' ? 'block' : 'none';
        $showMobileLandscape = $config['show-on-mobile-landscape'] == 'yes' ? 'block' : 'none';
        $showMobilePortrait = $config['show-on-mobile-portrait'] == 'yes' ? 'block' : 'none';

        $less = new \Shopware\Components\Theme\LessDefinition(
            array(
                'normalOpacity' => 1 - (intval($config['transparency-normal'], 10) / 100),
                'hoverOpacity' => 1 - (intval($config['transparency-hover'], 10) / 100),
                'hoverAnimationDuration' => $config['hover-animation-duration'] . "ms",
                'buttonSize' => $config['button-size'],
                'buttonMargin' => $config['button-margin'],
                'arrowColor' => $config['arrow-color'],
                'arrowColorHover' => $config['arrow-color-hover'],
                'backgroundColor' => $config['background-color'],
                'borderRadius' => $config['border-radius'] . 'px',
                'showDesktop' => $showDesktop,
                'showTabletLandscape' => $showTabletLandscape,
                'showTabletPortrait' => $showTabletPortrait,
                'showMobileLandscape' => $showMobileLandscape,
                'showMobilePortrait' => $showMobilePortrait
            ),
            array(
                $dir . 'frontend/_public/src/less/all.less'
            ),
            $dir
        );

        return new ArrayCollection(array($less));
    }


    /**
     * @return string
     */
    private function getPluginViewDir()
    {
        return Shopware()->Container()->getParameter('comme_scroll_to_top.view_dir');
    }

}
