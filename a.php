<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$_SERVER['HTTP_X_HUB_SIGNATURE'] = 'sha256=c49d3865697080ab3bd95da36c2b5fcc5e4ad0dd06ad09e9aaf3d01b18279a3e';

abstract class Deploy
{
    private static string $secret = 'YhçaQd ) -_! ka12@ @adb#';
    private static string $dirApplication = '.';
    private static string $logfile = 'deploy.log';

    public static function deploy()
    {
        self::log('Start deploy');
        chdir(self::$dirApplication);
        
        if(!self::validateSecret())
            return self::deployError();

        $outputGitConfig = shell_exec('git config --global --add safe.directory /var/www/html 2>&1');
        self::log("Git config safe.directory :\n" . $outputGitConfig);

        $outputGit = shell_exec('git pull origin main 2>&1');
        self::log("Git Pull Output:\n" . $outputGit);

        self::log('Deploy concluído');

        header('Content-Type: application/json; charset=utf-8', true, 200);
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
        $payload = '' ?: file_get_contents('php://input');
        
        $compute = hash_hmac($hashAlgo, $payload, self::$secret);
        
        return hash_equals($compute, $signature);
    }

    private static function deployError()
    {
        header('Content-Type: application/json; charset=utf-8', true, 401);
        $output = ['message' => 'Secret key error'];
        echo json_encode($output);
        self::log('Secret key error');
        self::log('End with error');
        die();
    }
}

Deploy::deploy();