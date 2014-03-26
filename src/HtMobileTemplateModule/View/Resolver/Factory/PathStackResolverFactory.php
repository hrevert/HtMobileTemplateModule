<?php
namespace HtMobileTemplateModule\View\Resolver\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Resolver\TemplatePathStack;

class PathStackResolverFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $resolvers)
    {
        $config = $resolvers->getServiceLocator()->get('Config')['ht_mobile_template']['path_stack'];
        $mobileDetect = $this->getServiceLocator()->get('MobileDetect');

        $resolver = new TemplatePathStack;
        $match = false;
        foreach ($config as $media => $pathStacks) {
            if ($mobileDetect->is($media)) {
                $match = true;
                $resolver->addPaths($pathStacks);
            }
        }

        if (!$match && isset($config['default'])) {
            $resolver->addPaths($config['default']);
        }

        return $resolver;
    }
}
