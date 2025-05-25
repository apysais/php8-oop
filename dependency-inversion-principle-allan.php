<?php

//Dependency Inversion Principle (DIP) Example
//https://dev.to/devlinaung/solid-principles-in-php-363j
//https://refactoring.guru/solid-principles#dependency-inversion-principle
interface Printable {
    public function get_content(): string;
}

class Book implements Printable {
    public function get_content() : string {
        return "This is a book.";
    }
}

class Magazine implements Printable {
    public function get_content() : string {
        return "This is a magazine.";
    }
}

class Printer {
    public function print_content(Printable $printable) : void {
        echo 'Print Content: ' . $printable->get_content() . "<br>";
    }
}

$print = new Printer();
$book = new Book();
$magazine = new Magazine();
$print->print_content($book);      // Output: Print Content: This is a book.
$print->print_content($magazine);  // Output: Print Content: This is a magazine.