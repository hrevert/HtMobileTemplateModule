<?php
namespace HtMobileTemplateModule\View\Resolver\Factory;

use Zend\View\Resolver;
use Zend\ServiceManager\ServiceLocatorInterface;

class PathStackFactory extends AbstractFactory
{
    /**
     * {@inheritDoc}
     */  
    protected function getConfig(ServiceLocatorInterface $serviceLocator)
    {
        return $serviceLocator->get('Config')['ht_mobile_template']['path_stack'];
    }

    /**
     * Initiates new template path stack resolver
     *
     * @return Resolver\TemplatePathStack
     */ 
    protected function getResolver()
    {
        return new Resolver\TemplatePathStack;
    }

    /**
     * {@inheritDoc}
     */    
    protected function configure(Resolver\ResolverInterface $resolver, $pathStacks)
    {
        $resolver->addPaths($pathStacks);
    }
}
