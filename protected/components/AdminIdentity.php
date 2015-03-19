<?php

/**
 * StudentIdentity represents the data needed to identity a Student.
 * It contains the authentication method that checks if the provided
 * data can identity the Student.
 */
class AdminIdentity extends CUserIdentity {

    private $_id;

    /**
     * Authenticates a Student.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent Student identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {        
        if (strpos($this->username, "@")) {
            $user = UserAdmin::model()->findByAttributes(array('email' => $this->username));
        } else {
            $user = UserAdmin::model()->findByAttributes(array('username' => $this->username));
        }

        if ($user === null) { // No user found!
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($user->password !== SHA1($this->password)) { // Invalid password!
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else { // Okay!
            $this->errorCode = self::ERROR_NONE;
            // Store the role in a session:
            $this->setState('group', $user->group_id);
            $this->setState('email', $user->email);
            $this->setState('fullname', $user->name);
            $this->_id = $user->id;
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}