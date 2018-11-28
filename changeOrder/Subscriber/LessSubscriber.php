<?php

namespace changeOrder\Subscriber;


use \Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Enlight\Event\SubscriberInterface;
use Shopware\Components\Theme\LessDefinition;

class LessSubscriber implements SubscriberInterface {
    private $container;
    private $config;
    public function __construct(ContainerInterface $container) {

        $this->container = $container;
        $this->config = Shopware()->Container()->get('shopware.plugin.cached_config_reader')->getByPluginName('changeOrder');
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

        $color_of_likedicon = $config['style-likedicon-elements'];
        $color_of_carticon = $config['style-carticon'];
        $color_of_accicon = $config['style-accicon'];

        $hideAccName = $config['show-name'];
        $hideCartAmount = $config['show-price'];
        $hideAccountName = 'inline';
        $hideCartText = 'inline';

        $widthOfAccButton = "auto";
        $widthOfCartButton = "auto";
        $paddingOfAccButton = "0 10px 0 40px";
        $paddingOfCartButton = "0 10px 0 40px";

        $borderRadius = $config['border-radius']."px";
        $borderColor = $config['border-color'];
        $borderColorHover = $config['border-color-hover'];

        if ($hideAccName){
            $hideAccountName = 'none';
            $widthOfAccButton = "42px";
            $paddingOfAccButton = "0 10px 0 28px";
        }

        if ($hideCartAmount){
            $hideCartText = 'none';
            $widthOfCartButton = "42px";
            $paddingOfCartButton = "0 10px 0 32px";
        }

        $less = new LessDefinition(
            array(
                'iconLikedColor' => $color_of_likedicon,
                'iconCartColor' => $color_of_carticon,
                'iconAccColor' => $color_of_accicon,
                'accName' => $hideAccountName,
                'cartText' => $hideCartText,
                'buttonWidth' => $widthOfAccButton,
                'accButtonPadding' => $paddingOfAccButton,
                'buttonCartWidth' => $widthOfCartButton,
                'buttonCartPadding' => $paddingOfCartButton,
                'radius' => $borderRadius,
                'borderColor' => $borderColor,
                'borderColorhover' => $borderColorHover
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
        return Shopware()->Container()->getParameter('change_order.view_dir');
    }
}