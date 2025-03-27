<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
header('Content-Type: application/json; charset=utf-8');

abstract class Deploy
{
    private static string $secret = 'YhçaQd ) -_! ka12@ @adb#';
    private static string $dirApplication = '/var/www/html';
    private static string $logfile = 'deploy.log';

    public static function deploy()
    {
        self::log('Start deploy');
        chdir(self::$dirApplication);
        
        if(!self::validateSecret())
            self::deployError();

        $outputGitConfig = shell_exec('git config --global --add safe.directory /var/www/html 2>&1');
        self::log("Git config safe.directory :\n" . $outputGitConfig);

        $outputGit = shell_exec('git pull origin main 2>&1');
        self::log("Git Pull Output:\n" . $outputGit);

        self::log('Deploy concluído');

        http_response_code(200);
        $output = ['message' => 'Deployment completed'];
        echo json_encode($output);
    }

    public static function log($message)
    {
        $date = date('Y-m-d H:i:s');
        $message = '[' . $date . "] $message\n";
        error_log($message, 3, self::$logfile);
    }

    private static function validateSecret()
    {
        if(!array_key_exists('HTTP_X_HUB_SIGNATURE', $_SERVER)) {
            return false;
        }
    
        list($hashAlgo, $signature) = explode('=', @$_SERVER['HTTP_X_HUB_SIGNATURE']);
        $payload = $HTTP_RAW_POST_DATA ?: file_get_contents('php://input');
        
        $compute = hash_hmac($hashAlgo, $payload, self::$secret);
        
        return hash_equals($compute, $signature);
    }

    private static function deployError()
    {
        http_response_code(401);
        $output = ['message' => 'Secret key error'];
        echo json_encode($output);
        self::log('Secret key error');
        self::log('End with error');
        die();
    }
}

Deploy::deploy();