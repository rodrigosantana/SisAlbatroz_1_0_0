<?php
/**
 * @Table(name="user_access_map")
 * @Entity
 */
class UserAccessMap {
    
    /**
     * @var integer $userRoleId
     * @ManyToOne(targetEntity="UserRole")
     * @JoinColumns({
     *   @JoinColumn(name="user_role_id", referencedColumnName="id")
     * })
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $userRoleId;
    
    /**
     * @var string $controller
     * @Column(name="controller", type="string", length=50)
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $controller;
    
    /**
     *@var integer $permission
     *@Column(name="permission", type="integer")
     */
    private $permission;
    
    
    public function setUserRoleId($userRoleId) {
        $this->userRoleId = $userRoleId;
    }
    
    public function getUserRoleId() {
        return $this->userRoleId;
    }
    
    public function setController($controller) {
        $this->controller = $controller;
    }
    
    public function getController() {
        return $this->controller;
    }
    
    public function setPermission($permission) {
        $this->permission = $permission;
    }
    
    public function getPermission() {
        return $this->permission;
    }
}
