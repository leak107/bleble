<?php 

require_once './Profile.php';

class User
{
    private Profile $profile;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $firstName, string $lastName, string $birthdate, string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->profile = new Profile($firstName, $lastName, $birthdate);
    }

    public function getProfile()
    {
        return $this->profile;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }
}
