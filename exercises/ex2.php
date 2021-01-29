<?php


// The purpose of this cron is to update remotely a PHP file that is present on 4 websites.
// This file is large and heavy, as it contains a list of articles and their content.
// The content of this file is not provided, as it is not necessary to do this test.
$ftp_servers = array(
    array('ftp.site1.com', 'sEt7UMac', '&Re2adav9n'),
    array('85.98.102.10', 'h5THaW2U', 'p@U5Eb5phu"'),
    array('site3.com', 'M6wareb7', '2joQDLe_-PQO'),
    array('redirect.site4.com', '6utrAfru', 'jepoe123___'),
);

print '<pre>';
foreach ($ftp_servers as $server_data) {
    list($host, $user, $pass) = $server_data;
    // $upload_status = upload_latest_file($host, $user, $pass);
    print str_pad("Server is $host ($user / $pass)", 50, "_");
    // print $upload_status ? 'success' : 'error';
    print "\n";
}
print '</pre>';

// This function requires a lot of time (between 60 and 120 seconds) every time that it is called.
// function upload_latest_file($host, $user, $pass)
// {
//     $conn = ftp_connect($host);
//     if (!$conn) return false;

//     $conn_login = ftp_login($conn, $user, $pass);
//     if (!$conn_login) return false;

//     $upload_from = 'latest-news.php';
//     $upload_to = '/news.php';
//     return (ftp_nb_put($conn, $upload_to, $upload_from, FTP_ASCII));
// }

/*
I see different problems:
1) Using '@' operator we are hiding all errors, this is a bad practice
2) the function 'str_pad("Server is $host ($user / $pass)", 0, 50)' is not doing anything.
3) the function 'ftp_fput($conn, $upload_from, $upload_to, FTP_ASCII)' is wrongly used, since the 2º argument should be '$upload_to' and not '$upload_from'; besides, the 3rd argument should be a pointer to the opened file, such as 'fopen($upload_from)' not just a string of the path.
4) With every file we want to upload, we are stucking the execution for 1-2 minutes, so this is very innefficient; halting the server for too long.


The sollutions I would give are:
1) Remove '@' operator
2) Removing the function str_pad() or change the arguments with, for example: 'str_pad("Server is $host ($user / $pass)", 50, "_", STR_PAD_BOTH)' which will and an underscore on both sides of the given string until the number of total caracters of the new string is equal to 50.
3) & 4) I would directly change the function 'ftp_fput()' to either 'ftp_nb_fput($conn, $upload_to, fopen($upload_from), FTP_ASCII)' or  'ftp_nb_put($conn, $upload_to, $upload_from, FTP_ASCII)' ; to make asynchronous upload to the FTP server and the execution of the program wont be waiting 1-2 mins for every website is updating
*/