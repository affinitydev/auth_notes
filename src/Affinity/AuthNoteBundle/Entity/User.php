<?php

namespace Affinity\AuthNoteBundle\Entity;

use Affinity\SimpleAuth\Model\UserInterface;
use Affinity\SimpleAuth\Model\RoleInterface;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;


/**
 * @ORM\Entity @ORM\Table(name="Users")
 */
class User extends BaseUser implements UserInterface
{
    /**
     * @ORM\id @ORM\Column(type="integer") @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * Represents the simpleaAuth role structure.  The reason this is
     * note named "$roles" is because Symfony2 already has a reserved
     * roles property on their user interface.
     * 
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="UsersRoles",
     *      joinColumns={@ORM\JoinColumn(name="UserId", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="RoleId", referencedColumnName="Id")}
     * )
     */
    protected $simpleAuth_roles;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
        
        $this->simpleAuth_roles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Accepts a role.  If it is a SimpleAuth role object, it will add it to
     * the roles array.  Otherwise, it will call the parent addRole() function.
     * 
     * @param \Affinity\SimpleAuth\Model\RoleInterface $role
     */
    public function addRole($role)
    {
        /*if($role instanceof RoleInterface)
            $this->simpleAuth_roles[] = $role;
        else*/
            parent::addRole($role);
    }

    public function getRoles()
    {
        return $this->simpleAuth_roles->toArray();
    }
    
    public function getEmail()
    {
        return $this->email;
    }
}