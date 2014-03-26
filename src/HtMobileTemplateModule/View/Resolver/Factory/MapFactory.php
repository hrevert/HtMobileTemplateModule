<?php
namespace HtMobileTemplateModule\View\Resolver\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Resolver\TemplateMapResolver;

class MapFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $resolvers)
    {
        $config = $resolvers->getServiceLocator()->get('Config')['ht_mobile_template']['map'];
        $mobileDetect = $this->getServiceLocator()->get('MobileDetect');

        $mapResolver = new TemplateMapResolver;
        $match = false;
        foreach ($config as $media => $maps) {
            if ($mobileDetect->is($media)) {
                $match = true;
                $mapResolver->merge($maps);
            }
        }
        if (!$match && isset($config['default'])) {
            $resolver->merge($config['default']);
        }

        return $mapResolver;
    }
}
