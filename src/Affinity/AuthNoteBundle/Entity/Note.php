<?php

namespace Affinity\AuthNoteBundle\Entity;

use Affinity\SimpleAuth\Generic\Resource\ObjectResourceInterface;
use Affinity\SimpleAuth\Helper\Extension\ResourceNameTrait;
use Affinity\SimpleAuth\Helper\Extension\ResourceKeyTrait;
use Affinity\SimpleAuth\Helper\Extension\ObjectResourceTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="Notes")
 */
class Note implements ObjectResourceInterface
{
    /**
     * Perform some setup for SimpleaAuth.  The default traits will
     * fufull the ObjectResourceInterface, and the constants 
     */
    use ResourceNameTrait,
        ResourceKeyTrait,
        ObjectResourceTrait;
    
    const RESOURCE_NAME = 'AuthNoteBundle_Note';
    const RESOURCE_KEY_FIELD = 'Id';
    
    /**
     * @ORM\Id 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue
     */
    protected $Id;
    
    /**
     * @ORM\Column(type="string")
     */
    public $NoteTitle;
    
    /**
     * @ORM\Column(type="string")
     */
    public $NoteText;
}