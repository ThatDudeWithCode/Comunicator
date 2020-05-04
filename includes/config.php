<?php

/**
 * Configuration Details
 * @package Communicater
 * @author Tristan Elliott
 */

session_start();

$con = mysqli_connect("localhost", "root", "", "communicator_db");

if(mysqli_connect_errno()) {
    echo "Failed to connect" . mysqli_connect_errno();
}