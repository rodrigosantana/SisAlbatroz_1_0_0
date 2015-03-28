<?php

/**
 * MbGeral
 *
 * @Table(name="system_users")
 * @Entity
 */
class SystemUsers {

    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue
     */
    private $id;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=254)
     */
    private $email;

    /**
     * @var string $password
     *
     * @Column(name="password", type="string", length=160)
     */
    private $password;

    /**
     * @var string $salt
     *
     * @Column(name="salt", type="string", length=160)
     */
    private $salt;

    /**
     * @var integer $userRoleId
     *
     * @Column(name="user_role_id", type="integer")
     */
    private $userRoleId;

    /**
     * @var datetime $lastLogin
     *
     * @Column(name="last_login", type="datetime")
     */
    private $lastLogin;

    /**
     * @var string $lastLoginIp
     *
     * @Column(name="last_login_ip", type="string", length=64)
     */
    private $lastLoginIp;

    /**
     * @var string $resetRequestCode
     *
     * @Column(name="reset_request_code", type="string", length=128)
     */
    private $resetRequestCode;

    /**
     * @var datetime $resetRequestTime
     *
     * @Column(name="reset_request_time", type="datetime")
     */
    private $resetRequestTime;

    /**
     * @var string $resetRequestIp
     *
     * @Column(name="reset_request_ip", type="string", length=64)
     */
    private $resetRequestIp;

    /**
     * @var integer $verificationStatus
     *
     * @Column(name="verification_status", type="smallint")
     */
    private $verificationStatus;

    /**
     * @var integer $status
     *
     * @Column(name="status", type="smallint")
     */
    private $status;
    
    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=255)
     */
    private $name;

    public function getId() {
        return $this->id;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
        return $this;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function setUserRoleId($userRoleId) {
        $this->userRoleId = $userRoleId;
        return $this;
    }

    public function getUserRoleId() {
        return $this->userRoleId;
    }

    public function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
        return $this;
    }

    public function getLastLogin() {
        return $this->lastLogin;
    }

    public function setLastLoginIp($lastLoginIp) {
        $this->lastLoginIp = $lastLoginIp;
        return $this;
    }

    public function getLastLoginIp() {
        return $this->lastLoginIp;
    }

    public function setResetRequestCode($resetRequestCode) {
        $this->resetRequestCode = $resetRequestCode;
        return $this;
    }

    public function getResetRequestCode() {
        return $this->resetRequestCode;
    }

    public function setResetRequestTime($resetRequestTime) {
        $this->resetRequestTime = $resetRequestTime;
        return $this;
    }

    public function getResetRequestTime() {
        return $this->resetRequestTime;
    }

    public function setResetRequestIp($resetRequestIp) {
        $this->resetRequestIp = $resetRequestIp;
        return $this;
    }

    public function getResetRequestIp() {
        return $this->resetRequestIp;
    }

    public function setVerificationStatus($verificationStatus) {
        $this->verificationStatus = $verificationStatus;
        return $this;
    }

    public function getVerificationStatus() {
        return $this->verificationStatus;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getName() {
        return $this->name;
    }
}
