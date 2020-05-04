<?php

/**
 * Class User
 * @package Communicator
 * @author Tristan Elliott
 */

class User
{
    /**
     * @var array|null
     */
    private $user;
    private $con;

    /**
     * User constructor.
     * @param $con
     * @param $user
     */
    public function __construct($con, $user)
    {
        $this->con = $con;
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$user'");
        $this->user = mysqli_fetch_array($user_details_query);
    }

    /**
     * @return string
     */
    public function getFirstAndLastName()
    {
        $username = $this->user['username'];
        $query = mysqli_query($this->con, "SELECT first_name, last_name FROM users WHERE username='$username'");
        $row = mysqli_fetch_array($query);
        return $row['first_name'] . " " . $row['last_name'];
    }
}