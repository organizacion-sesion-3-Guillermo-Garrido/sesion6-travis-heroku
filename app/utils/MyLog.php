<?php
namespace cursophp7\app\utils;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MyLog
{
    /**
     * @var Logger
     */
    private $log;

    private $level;

    /**
     * MyLog constructor.
     * @param $log
     */
    private function __construct(string $file_name, int $level)
    {
        $this->log = new Logger('name');
        $this->level = $level;
        $this->log->pushHandler(
            new StreamHandler($file_name, $this->level)
        );
    }

    /**
     * @param string $file_name
     * @return MyLog
     */
    public static function load(string $file_name, int $level = Logger::INFO):MyLog{
        return new MyLog($file_name, $level);
    }

    /**
     * @param string $message
     */
    public function add(string $message):void{
        $this->log->log($this->level, $message);
    }

}