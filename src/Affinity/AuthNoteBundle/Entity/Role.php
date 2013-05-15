<?php

namespace Affinity\AuthNoteBundle\Entity;

use Affinity\SimpleAuth\Model\RoleInterface as AuthRoleInterface;
use Symfony\Component\Security\Core\Role\RoleInterface as SfRoleInterface;
use Doctrine\ORM\Mapping as ORM;


/**
 * Note that this Role class implements both the Symfony and
 * SimpleAuth role types.  This is because of a conflict between
 * the Symfony implementation of the User class, required by
 * the FOSUserBundle.  The only method required by the Symfony
 * RoleInterface is getRole(), which returns null since it will
 * not be used.
 * 
 * @ORM\Entity @ORM\Table(name="Roles")
 */
class Role implements AuthRoleInterface, SfRoleInterface
{
    /**
     * @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue
     */
    protected $Id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $RoleName;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $ParentRoleId;
    
    /**
     * @ORM\OneToMany(targetEntity="Permission", mappedBy="role")
     */
    protected $permissions;
  
    /**
     * @ORM\OneToOne(targetEntity="Role")
     * @ORM\JoinColumn(name="ParentRoleId", referencedColumnName="Id")
     */
    protected $parentRole;
    
    
    public function addPermission(\Affinity\SimpleAuth\Model\PermissionInterface $permission) {
        
    }

    public function getOrder() {
        
    }

    public function getParentRole() {
        return $this->parentRole;
    }

    public function getPermissions() {
        return $this->permissions;
    }
    
    public function getRoleName()
    {
        return $this->RoleName;
    }

    public function setOrder($order) {
        
    }

    public function setParentRole(RoleInterface $role) {
        
    }
    
    public function getRole()
    {
        return null;
    }
}