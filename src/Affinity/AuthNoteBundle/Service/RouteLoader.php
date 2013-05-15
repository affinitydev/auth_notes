<?php

/**
 * This file is part of the Affinity Development 
 * open source toolset.
 * 
 * @author Brendan Bates <brendanbates89@gmail.com>
 * @package AuthNotes
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

namespace Affinity\AuthNoteBundle\Service;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

/**
 * 
 * Class Description.
 * 
 * @package AuthNotes
 * 
 */
class RouteLoader extends Loader
{
    public function load($resource, $type = null)
    {
        $collection = new RouteCollection();
        
        $resource = '@AuthNoteBundle/Resources/config/bundle_routing.yml';
        $type = 'yaml';
        
        $importedRoutes = $this->import($resource, $type);
        
        $collection->addCollection($importedRoutes);
        
        return $collection;
    }

    public function supports($resource, $type = null)
    {
        return $type === "auth_note_route_loader";
    }    
}
