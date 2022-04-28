<?php 

class Profile
{
    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $birthdate
     */
    public function __construct(string $firstName, string $lastName, string $birthdate)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdate = $birthdate;
    }
    
}
