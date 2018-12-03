<?php

namespace passwordStrength;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class passwordStrength extends Plugin
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
        $container->setParameter('password_strength.plugin_dir', $this->getPath());
        $container->setParameter('password_strength.view_dir', $this->getPath() . '/Resources/views/');
        parent::build($container);
    }
}