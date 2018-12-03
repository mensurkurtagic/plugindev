<?php
namespace passwordStrength\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\Plugin\ConfigReader;
use Enlight_Controller_ActionEventArgs;

class passSubscriber implements SubscriberInterface
{
    private $pluginName;
    private $config;
    private $container;
    private $newsletterPrinter;

    public function __construct($pluginName, $container)
    {
        $this->pluginName = "passwordStrength";
        $this->config =Shopware()->Container()->get('shopware.plugin.cached_config_reader')->getByPluginName('passwordStrength');
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

        $show_hide = $config['show-checker'];

        $value = 0;
        if($show_hide) $value = 1;



        $view->addTemplateDir($this->getPluginViewDir());
        $view->extendsTemplate('frontend/password_strength/register/personal_fieldset.tpl');

        $view->assign('value', $value);

    }
    /**
     * @return string
     */
    private function getPluginViewDir()
    {
        return Shopware()->Container()->getParameter('password_strength.view_dir');
    }
}
