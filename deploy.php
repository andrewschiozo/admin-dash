<?php

$dir = '/var/www/html';
$logfile = 'deploy.log';

chdir($dir);

//$outputWhoami = shell_exec('whoami 2>&1');
//echo $outputWhoami;
//die();

$outputGitConfig = shell_exec('git config --global --add safe.directory /var/www/html 2>&1');
error_log("Git config safe.directory :\n" . $outputGitConfig . "\n", 3, $logfile);

$outputGit = shell_exec('git pull origin main 2>&1');
error_log("Git Pull Output:\n" . $outputGit . "\n", 3, $logfile);

//var_dump($outputGit);

$outputService = shell_exec('sudo systemctl restart php-fpm 2>&1');
error_log( "Service Restart Output:\n" . $outputService . "\n", 3, $logfile);

error_log( "Deployment completed successfully.", 3, $logfile);

http_response_code(200);
header('Content-Type: application/json; charset=utf-8');
$output = ['message' => 'Deployment completed'];
echo json_encode($output);