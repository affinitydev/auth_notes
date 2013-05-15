<?php

/**
 * This file is part of the Affinity Development 
 * open source toolset.
 * 
 * @author Brendan Bates <brendanbates89@gmail.com>
 * @package AuthNotes
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

namespace Affinity\AuthNoteBundle\Factory;

use FOS\UserBundle\Doctrine\UserManager;
use Affinity\AuthNoteBundle\Entity\User;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * 
 * Class Description.
 * 
 * @package AuthNotes
 * 
 */
class UserFactory
{
    /**
     * @var SecurityContext
     */
    private $securityContext;
    
    /**
     * @var UserManager
     */    
    private $userManager;
    
    public function __construct(SecurityContext $context, UserManager $userManager)
    {
        $this->securityContext = $context;
        $this->userManager = $userManager;
    }
    
    /**
     * Retrieves the current Security user.  If one is not found, then an
     * anonymous user is loaded from the database.  If no anonymous user
     * exists, then a null will be returned.
     * 
     * @return null|\Affinity\AuthNoteBundle\Entity\User
     */
    public function getUser()
    {
        $token = $this->securityContext->getToken();
        $user = $token->getUser();
        
        if ($token === null || !is_object($user))
        {
            $userAnon = $this->userManager->findUserByUsername('anonymous');            
            if($userAnon === null || !($userAnon instanceof User))
                return null;
            else
                return $userAnon;
        }
        
        return $user;
    }
}
