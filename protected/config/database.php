<?php

// This is the database connection configuration.
<<<<<<< HEAD
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=caesar',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
	
);
=======
return [
    'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
    // uncomment the following lines to use a MySQL database
    /*
    'connectionString' => 'mysql:host=localhost;dbname=testdrive',
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    */
];
>>>>>>> b27b50d58d4ff8f1dede875f8ec84bb811a33f8b
