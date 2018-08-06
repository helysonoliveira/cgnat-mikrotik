<?php
require_once(__DIR__.'/configure.php');

class write {
    
    public static function file($message, $filename = '')
    {
        $text = '';
        if ( $filename != '' ) {
            $logFile = $filename;
        }
        else {
            $logFile = __DIR__.'/cgnat-mikrotik.txt';
        }            
        $text .= $message."\n";					
        $handle = fopen($logFile, 'a');
        fwrite($handle, $text);
        fclose($handle);
               
    }
    
}
