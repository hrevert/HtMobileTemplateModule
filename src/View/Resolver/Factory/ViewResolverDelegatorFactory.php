<?php
namespace HtMobileTemplateModule\View\Resolver\Factory;

use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Resolver\AggregateResolver;

class ViewResolverDelegatorFactory implements DelegatorFactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return AggregateResolver
     */
    public function createDelegatorWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName, $callback)
    {
        $resolver = $callback();

        $resolver->attach($serviceLocator->get('HtMobileTemplateModule\View\Resolver\Map'), 4000);
        $resolver->attach($serviceLocator->get('HtMobileTemplateModule\View\Resolver\PathStack'), 2000);

        return $resolver;
    }    
}
