<?php

/**
 * This file is part of the Affinity Development 
 * open source toolset.
 * 
 * @author Brendan Bates <brendanbates89@gmail.com>
 * @package AuthNotes
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

namespace Affinity\AuthNoteBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\EntityManager;
use Affinity\SimpleAuth\AuthContext;
use Affinity\SimpleAuth\Generic\Action;
use Affinity\AuthNoteBundle\Entity\Note;
use Affinity\AuthNoteBundle\Entity\User;

/**
 * 
 * The controller, allowing users to view, create, and modify
 * various notes.
 * 
 * @package AuthNotes
 * 
 * @Route("/notes", service="auth_note.note_controller")
 * 
 */
class NoteController
{
    /**
     * @var AuthManager
     */
    private $authManager;
    
    /**
     * @var User
     */
    private $user;
    
    /**
     * @var EntityManager 
     */
    private $em;
    
    public function __construct(AuthContext $authContext, EntityManager $em)
    {
        $this->authManager = $authContext->getAuthManager();
        $this->user = $authContext->getUser();
        $this->em = $em;
    }
    
    /**
     * View specific note details about an individual note.
     * 
     * @Route("/{noteId}")
     * 
     * @param integer $noteId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewNoteAction($noteId)
    {
        // Load the note from the database, to make sure it exists.
        /* @var Affinity\AuthNoteBundle\Entity\Note $note */
        $note = $this->em->find('Affinity\AuthNoteBundle\Entity\Note', $noteId);
        if($note === null)
            throw new NotFoundHttpException("Note " . $noteId . " was not found in the database.");
        
        // Check if the current user can read the current note.
        if(!$this->authManager->allowed($note, Action::Read))
            throw new AccessDeniedHttpException("You are not allowed to view note " . $noteId . ".");
        
        $responseStr = "<b>" . $note->NoteTitle . "</b><br/><p>" . $note->NoteText . "</p>";
        return new Response($responseStr);
    }
}
