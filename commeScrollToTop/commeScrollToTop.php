<?php
/**
 * @copyright  Copyright (c) 2018
 * @category   
 * @author     Commerce Care
 */
namespace commeScrollToTop;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class commeScrollToTop extends Plugin
{
    /**
     * @param InstallContext $context
     * @throws \Exception
     */
    public function install(InstallContext $context)
    {


        parent::install($context);
    }

     public function uninstall(UninstallContext $context)
    {

        parent::uninstall($context);
    }


     public function build(ContainerBuilder $container) {
        $container->setParameter('comme_scroll_to_top.plugin_dir', $this->getPath());
        $container->setParameter('comme_scroll_to_top.view_dir', $this->getPath() . '/Resources/views/');
        parent::build($container);
    }


}
