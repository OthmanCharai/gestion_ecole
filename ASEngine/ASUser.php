<?php

/**
 * Advanced Security - PHP Register/Login System
 *
 * @author Milos Stojanovic
 * @link   http://mstojanovic.net
 */

/**
 * User class.
 */
class ASUser
{
    /**
     * @var ASDatabase Instance of ASDatabase class
     */
    private $db;
    /**
     * @var ASPasswordHasher
     */
    private $hasher;
    /**
     * @var ASValidator
     */
    private $validator;
    /**
     * @var ASLogin
     */
    private $login;
    /**
     * @var ASRegister
     */
    private $registrator;

    /**
     * Class constructor
     * @param ASDatabase $db
     * @param ASPasswordHasher $hasher
     * @param ASValidator $validator
     * @param ASLogin $login
     * @param ASRegister $registrator
     */
    public function __construct(
        ASDatabase $db,
        ASPasswordHasher $hasher,
        ASValidator $validator,
        ASLogin $login,
        ASRegister $registrator
    ) {
        $this->db = $db;
        $this->hasher = $hasher;
        $this->validator = $validator;
        $this->login = $login;
        $this->registrator = $registrator;
    }

    /**
     * Get all user details including email, username and last_login
     * @param $userId int User's id.
     * @return array User details or null if user with given id doesn't exist.
     */
    public function getAll($userId)
    {
        $query = "SELECT `utilisateur`.`email`, `utilisateur`.`username`,`utilisateur`.`last_login`
                  FROM `utilisateur`
                  WHERE `utilisateur`.`id_utilisateur` = :id";

        $result = $this->db->select($query, array('id' => $userId));

        return count($result) > 0 ? $result[0] : null;
    }

    /**
     * Add new user using data provided by administrator from admin panel.
     * @param $data array All data filled in administrator's "Add User" form
     */
    public function add($data)
    {
        if ($errors = $this->registrator->validateUser($data, false)) {
            respond(array("errors" => $errors), 422);
        }

        $this->db->insert('as_users', array(
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => $this->hashPassword($data['password']),
            'confirmed' => 'Y',
            'confirmation_key' => '',
            'register_date' => date('Y-m-d H:i:s')
        ));

        $this->db->insert('as_user_details', array(
            'user_id' => $this->db->lastInsertId(),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'address' => $data['address']
        ));

        respond(array(
            "status" => "success",
            "message" => trans("user_added_successfully")
        ));
    }

    /**
     * Update user's details.
     * @param $userId int User's id.
     * @param $data array User data from admin's "edit user" form
     */
    public function updateUser($userId, array $data)
    {
        $currInfo = $this->getInfo($userId);

        if ($errors = $this->validateUserUpdate($currInfo, $data)) {
            respond(array("errors" => $errors), 422);
        }

        $userInfo = array(
            'email' => $data['email'],
            'username' => $data['username']
        );

        if ($data['password']) {
            $userInfo['password'] = $this->hashPassword($data['password']);
        }

        if ($userInfo) {
            $this->updateInfo($userId, $userInfo);
            ASSession::regenerate();
        }

        $this->updateDetails($userId, array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'address' => $data['address']
        ));

        respond(array(
            "status" => "success",
            "message" => trans("user_updated_successfully")
        ));
    }

    /**
     * Check if user with provided id is admin.
     * @param $userId User's id.
     * @return bool TRUE if user is admin, FALSE otherwise.
     */
    public function isAdmin($userId)
    {
        return $userId && strtolower($this->getRole($userId)) === "admin";
    }

    /**
     * Updates user's password.
     *
     * @param $userId
     * @param array $data
     */
    public function updatePassword($userId, array $data)
    {
        if ($errors = $this->validatePasswordUpdate($userId, $data)) {
            respond(array('errors' => $errors), 422);
        }

        $this->updateInfo($userId, array(
            "password" => $this->hashPassword($data['new_password'])
        ));

        ASSession::regenerate();

        respond(array('status' => 'success'));
    }

    /**
     * @param $userId
     * @param array $data
     * @return array
     */
    private function validatePasswordUpdate($userId, array $data)
    {
        $errors = array();

        if (! isset($data['old_password']) || $this->validator->isEmpty($data['old_password'])) {
            $errors['old_password'] = trans('field_required');
        }

        if (! isset($data['new_password']) || $this->validator->isEmpty($data['new_password'])) {
            $errors['new_password'] = trans('field_required');
        }

        if (! isset($data['new_password_confirmation'])
            || $this->validator->isEmpty($data['new_password_confirmation'])) {
            $errors['new_password_confirmation'] = trans('field_required');
        }

        if ($errors) {
            return $errors;
        }

        if ($data['new_password'] !== $data['new_password_confirmation']) {
            $errors['new_password_confirmation'] = trans('passwords_dont_match');
        }

        $user = $this->getInfo($userId);

        if ($this->hashPassword($data['old_password']) !== $user['password']) {
            $errors['old_password'] = trans('wrong_old_password');
        }

        return $errors;
    }

    /**
     * Changes user's role. If user's role was editor it will be set to user and vice versa.
     * @param $userId int User's id.
     * @param $role int New user's role.
     * @return string New user role.
     */
    public function changeRole($userId, $role)
    {
        $result = $this->db->select(
            "SELECT * FROM `as_user_roles` WHERE `role_id` = :r",
            array("r" => $role)
        );

        if (count($result) == 0) {
            return null;
        }

        $this->updateInfo($userId, array("user_role" => $role));

        ASSession::regenerate();

        return $result[0]['role'];
    }

    /**
     * Get current user's role.
     * @param $userId
     * @return string Current user's role.
     */
    public function getRole($userId)
    {
        $result = $this->db->select(
            "SELECT `as_user_roles`.`role` as role 
            FROM `as_user_roles`,`utilisateur`
            WHERE `utilisateur`.`user_role` = `as_user_roles`.`role_id`
            AND `utilisateur`.`id_utilisateur` = :id",
            array("id" => $userId)
        );

        return $result[0]['role'];
    }

    /**
     * Get basic user info provided during registration.
     * @param $userId int User's unique id.
     * @return array User info array.
     */
    public function getInfo($userId)
    {
        $result = $this->db->select(
            "SELECT * FROM `utilisateur` WHERE `id_utilisateur` = :id",
            array("id" => $userId)
        );

        return count($result) > 0 ? $result[0] : null;
    }

    /**
     * Updates user info.
     * @param $userId int User's unique id.
     * @param array $data Associative array where keys are database fields that need
     * to be updated and values are new values for provided database fields.
     */
    public function updateInfo($userId, $data)
    {
        $this->db->update(
            "as_users",
            $data,
            "`user_id` = :id",
            array("id" => $userId)
        );
    }

    /**
     * Get user details (First Name, Last Name, Address and Phone)
     * @param $userId int User's id.
     * @return array User details array.
     */
    public function getDetails($userId)
    {
        $result = $this->db->select(
            "SELECT * FROM `as_user_details` WHERE `user_id` = :id",
            array("id" => $userId)
        );

        if (count($result) == 0) {
            return array(
                "first_name" => "",
                "last_name" => "",
                "address" => "",
                "phone" => "",
                "empty" => true
            );
        }

        return $result[0];
    }


    /**
     * Updates user details.
     *
     * @param $userId int The ID of the user to update.
     * @param array $details Associative array where keys are database fields that need
     * to be updated and values are new values for provided database fields.
     */
    public function updateDetails($userId, $details)
    {
        $currDetails = $this->getDetails($userId);

        if (isset($currDetails['empty'])) {
            $details["user_id"] = $userId;
            return $this->db->insert("as_user_details", $details);
        }

        $this->db->update(
            "as_user_details",
            $details,
            "`user_id` = :id",
            array("id" => $userId)
        );

        respond(array('status' => 'success'));
    }

    /**
     * Delete user, all his comments and connected social accounts.
     * @param $userId
     */
    public function deleteUser($userId)
    {
        $this->db->delete("as_users", "user_id = :id", array("id" => $userId));
        $this->db->delete("as_user_details", "user_id = :id", array("id" => $userId));
        $this->db->delete("as_comments", "posted_by = :id", array("id" => $userId));
        $this->db->delete("as_social_logins", "user_id = :id", array("id" => $userId));
    }

    /**
     * Validate data provided during user update
     * @param $userInfo
     * @param $data
     * @return array
     */
    private function validateUserUpdate($userInfo, $data)
    {
        $errors = array();

        if ($userInfo == null) {
            $errors['email'] = trans('user_dont_exist');
            return $errors;
        }

        if ($this->validator->isEmpty($data['email'])) {
            $errors['email'] = trans('email_required');
        }

        if ($this->validator->isEmpty($data['username'])) {
            $errors['username'] = trans('username_required');
        }

        if ($data['password'] !== $data['password_confirmation']) {
            $errors['password_confirmation'] = trans('passwords_dont_match');
        }

        if (! $this->validator->emailValid($data['email'])) {
            $errors['email'] = trans('email_wrong_format');
        }

        //check if email is available
        if ($data['email'] != $userInfo['email'] && $this->validator->emailExist($data['email'])) {
            $errors['email'] = trans('email_taken');
        }

        //check if username is available
        if ($data['username'] != $userInfo['username'] && $this->validator->usernameExist($data['username'])) {
            $errors['username'] = trans('username_taken');
        }

        return $errors;
    }
    
    /**
     * Hash provided password.
     * @param string $password Password that needs to be hashed.
     * @return string Hashed password.
     */
    private function hashPassword($password)
    {
        return $this->hasher->hashPassword($password);
    }
}
