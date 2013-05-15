<?php

namespace Affinity\AuthNoteBundle\Entity;

use Affinity\SimpleAuth\Model\PermissionInterface;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity @ORM\Table(name="Permissions")
 */
class Permission implements PermissionInterface
{
    /**
     * @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue
     */
    protected $Id;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $RoleId;
    /**
     * @ORM\Column(type="string")
     */
    protected $ResourceName;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $ResourceKey;
    
    /**
     * @ORM\OneToMany(targetEntity="Action", mappedBy="permission")
     */
    protected $actions;
    
    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="permissions")
     * @ORM\JoinColumn(name="RoleId", referencedColumnName="Id")
     */
    protected $role;
    
    public function getId()
    {
        return $this->Id;
    }
    
    public function getResourceName() {
        return $this->ResourceName;
    }
    
    public function setResourceName($name)
    {
        $this->ResourceName = $name;
    }

    public function getActions() {
        return $this->actions;
    }

    public function setActions(array $actions) {
        
    }

    public function getResourceKey() {
        return $this->ResourceKey;
    }
    
    public function setResourceKey($key) {
        $this->ResourceKey = $key;
    }
}