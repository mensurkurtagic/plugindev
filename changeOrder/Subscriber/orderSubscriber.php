<?php
namespace changeOrder\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\Plugin\ConfigReader;
use Enlight_Controller_ActionEventArgs;

class orderSubscriber implements SubscriberInterface
{
    private $pluginName;
    private $config;
    private $container;
    private $newsletterPrinter;

    public function __construct($pluginName, $container)
    {
        $this->pluginName = "changeOrder";
        $this->config =Shopware()->Container()->get('shopware.plugin.cached_config_reader')->getByPluginName('changeOrder');
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onPostDispatch'
        ];
    }
    public function onPostDispatch(\Enlight_Controller_ActionEventArgs $args)
    {
        /** @var \Enlight_Controller_Action $controller */
        $controller = $args->getSubject();
        $view = $controller->View();
        $config = $this->config;
        $view->addTemplateDir($this->getPluginViewDir());

        if(strcmp($config['blocks-order'], "Choose from the list..") == 0){
            $value = 1;
        } elseif(strcmp($config['blocks-order'], "FirstCombo") == 0) {
            $value = 1;
        }elseif(strcmp($config['blocks-order'], "SecondCombo") == 0) {
            $value = 2;
        }elseif(strcmp($config['blocks-order'], "ThirdCombo") == 0) {
            $value = 3;
        }elseif(strcmp($config['blocks-order'], "FourthCombo") == 0) {
            $value = 4;
        }elseif(strcmp($config['blocks-order'], "FifthCombo") == 0) {
            $value = 5;
        }elseif(strcmp($config['blocks-order'], "SixthCombo") == 0) {
            $value = 6;
        }


        $view->addTemplateDir($this->getPluginViewDir());
        $view->extendsTemplate('frontend/change_order/index/shop-navigation.tpl');

        $view->assign('value', $value);

    }
    /**
     * @return string
     */
    private function getPluginViewDir()
    {
        return Shopware()->Container()->getParameter('change_order.view_dir');
    }
}
