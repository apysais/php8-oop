<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

interface Animal {
    public function makeSound();
    public function eat();
}

class Cat implements Animal {
    public function makeSound() {
        echo "Meow";
    }
    public function eat(){
        echo 'bite';
    }
}

$animal = new Cat();
$animal->makeSound();
echo '<br>';
$animal->eat();