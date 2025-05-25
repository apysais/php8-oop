<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Exception
 */

 function divide($dividend, $divisor) {
    if($divisor == 0) {
        throw new Exception('Division by Zero');
    }

    return ($dividend / $divisor);
 }

try {
    echo divide(5,0);
} catch (Exception $ex) {
    echo '<pre>';
    print_r($ex);
    echo '</pre>';
    
    $code = $ex->getCode();
    $message = $ex->getMessage();
    $file = $ex->getFile();
    $line = $ex->getLine();

    echo "Exception thrown in $file on line $line: [Code $code]  $message";

} finally {
    echo "Process Complete <br>";
}
 