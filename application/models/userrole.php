<?php

/**
 * @Table(name="user_role")
 * @Entity
 */
class UserRole {
    /**
     *@var integer $id
     *
     *@Column(name="id", type="integer")
     *@Id
     *@GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     *@var string $roleName
     *
     *@Column(name="role_name", type="string", length=50)
     */
    private $roleName;
    
    /**
     *@var string $defaultAccess
     *
     *@Column(name="default_access", type="string", length=10)
     */
    private $defaultAccess;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="UserAccessMap", mappedBy="userRoleId", cascade={"all"})
     */
    private $userAccessMap;
    
    public function __construct() {
        $this->userAccessMap = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setRoleName($roleName) {
        $this->roleName = $roleName;
    }
    
    public function getRoleName() {
        return $this->roleName;
    }
    
    public function setDefaultAccess($defaultAccess) {
        $this->defaultAccess = $defaultAccess;
    }
    
    public function getDefaultAccess() {
        return $this->defaultAccess;
    }
    
    public function getUserAccessMap() {
        return $this->userAccessMap;
    }
    
    public function addUserAccessMap(UserAccessMap $userAccessMap) {
        $userAccessMap->setUserRoleId($this);
        $this->userAccessMap[] = $userAccessMap;
    }
}
