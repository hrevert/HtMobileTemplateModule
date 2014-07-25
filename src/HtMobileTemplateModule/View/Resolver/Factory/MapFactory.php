<?php
namespace HtMobileTemplateModule\View\Resolver\Factory;

use Zend\View\Resolver;
use Zend\ServiceManager\ServiceLocatorInterface;

class MapFactory extends AbstractFactory
{
    /**
     * {@inheritDoc}
     */  
    protected function getConfig(ServiceLocatorInterface $serviceLocator)
    {
        return $serviceLocator->get('Config')['ht_mobile_template']['map'];
    }

    /**
     * Initiates new template path stack resolver
     *
     * @return Resolver\TemplateMapResolver
     */ 
    protected function getResolver()
    {
        return new Resolver\TemplateMapResolver;
    }

    /**
     * {@inheritDoc}
     */    
    protected function configure(Resolver\ResolverInterface $resolver, $maps)
    {
        $resolver->merge($maps);
    }
}
