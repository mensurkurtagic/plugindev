<?php

namespace passwordStrength\Subscriber;


use \Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Enlight\Event\SubscriberInterface;
use Shopware\Components\Theme\LessDefinition;

class LessSubscriber implements SubscriberInterface {
    private $container;
    private $config;
    public function __construct(ContainerInterface $container) {

        $this->container = $container;
        $this->config = Shopware()->Container()->get('shopware.plugin.cached_config_reader')->getByPluginName('passwordStrength');
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

        $less = new LessDefinition(
            array(

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
        return Shopware()->Container()->getParameter('password_strength.view_dir');
    }
}