<?php

namespace Affinity\AuthNoteBundle\Entity;

use Affinity\SimpleAuth\Model\ActionInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="Actions")
 */
class Action implements ActionInterface
{
    /**
     * @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue
     */
    protected $Id;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $PermissionId;
    /**
     * @ORM\Column(type="string")
     */
    protected $Name;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $Value;
    
    /**
     * @ORM\ManyToOne(targetEntity="Permission", inversedBy="actions")
     * @ORM\JoinColumn(name="PermissionId", referencedColumnName="Id")
     */
    protected $permission;
    
    public function getId()
    {
        return $this->Id;
    }

    public function getName() {
        return $this->Name;
    }

    public function getValue() {
        return $this->Value;
    }

    public function setName($name) {
        
    }

    public function setValue($value) {
        
    }
    
    public function getPermission()
    {
        return $this->permission;
    }
}