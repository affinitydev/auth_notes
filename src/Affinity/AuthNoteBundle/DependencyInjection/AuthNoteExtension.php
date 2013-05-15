<?php

/**
 * This file is part of the Affinity Development 
 * open source toolset.
 * 
 * @author Brendan Bates <brendanbates89@gmail.com>
 * @package AuthNotes
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

namespace Affinity\AuthNoteBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

/**
 * 
 * Class Description.
 * 
 * @package AuthNotes
 * 
 */
class AuthNoteExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {        
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        $loader->load('controllers.xml');
    }
    
    public function getAlias()
    {
        return "auth_note";
    }
}
