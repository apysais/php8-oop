<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class NotFoundException extends Exception {}

class ValidationException extends Exception {}

function process() {
    $request_uri = 'xxx';
    $name = '';

    try {
        if(empty($request_uri)) {
            throw new NotFoundException();
        }

        if(empty($name)) {
            throw new ValidationException('No Name');
        }

        return 'good';
    } catch (NotFoundException $ex) {
        return 'Page Not Found';
    } catch (ValidationException $ex) {
        return $ex->getMessage();
    }

}

if ( process() ) {
    echo process();
} else {
    echo process();
}

 