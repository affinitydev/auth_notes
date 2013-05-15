<?php

/**
 * This file is part of the Affinity Development 
 * open source toolset.
 * 
 * @author Brendan Bates <brendanbates89@gmail.com>
 * @package AuthNotes
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

namespace Affinity\AuthNoteBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * 
 * Default bundle package for AuthNote.
 * 
 * @package AuthNotes
 * 
 */
class AuthNoteBundle extends Bundle
{
    public function __construct()
    {
        //noop
    }
    
    public function getExternalConfig()
    {
        return __DIR__ . '/Resources/config/bundle_config.yml';
    }
}
