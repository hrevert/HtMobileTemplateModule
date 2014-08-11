<?php
namespace HtMobileTemplateModule\View\Resolver\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Resolver\ResolverInterface;

abstract class AbstractFactory implements FactoryInterface
{
    /**
     * Creates view resolver
     *
     * @param  ServiceLocatorInterface $resolvers
     * @return ResolverInterface
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $this->getConfig($serviceLocator);

        /** @var \Mobile_Detect */
        $mobileDetect = $serviceLocator->get('MobileDetect');

        $resolver = $this->getResolver();
        $match = false;
        foreach ($config as $media => $mediaConfig) {
            switch($media) 
            {
                case 'mobile':
                    if ($mobileDetect->isMobile()) {
                        $match = true;
                        $this->configure($resolver, $mediaConfig);
                    }
                    break;
                    
                case 'tablet':
                    if ($mobileDetect->isTablet()) {
                        $match = true;
                        $this->configure($resolver, $mediaConfig);
                    }
                    break;
                default:
                    if ($mobileDetect->is($media)) {
                        $match = true;
                        $this->configure($resolver, $mediaConfig);
                    }
                    break;                                                        
            }
        }
        if (!$match && isset($config['default'])) {
            $this->configure($resolver, $config['default']);
        }

        return $resolver;
    }

    /**
     * Gets Config
     *
     * @param ServiceLocatorInterface $serviceLocator
     */    
    abstract protected function getConfig(ServiceLocatorInterface $serviceLocator); 

    /**
     * Initiates new resolver
     *
     * @return ResolverInterface
     */    
    abstract protected function getResolver(); 

    /**
     * Configures resolver
     *
     * @param  ResolverInterface $resolver
     * @return void
     */    
    abstract protected function configure(ResolverInterface $resolver, $mediaConfig);
}
