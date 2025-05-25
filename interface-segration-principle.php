<?php

/**
 * SOLID PRINCIPLE
 * Interface Segregation Principle (ISP)
 * Clients should not be forced to depend on interfaces they do not use.
 * This principle encourages the creation of smaller, more specific interfaces
 * that are tailored to the needs of the clients.
 * Instead of having a large interface with many methods, create multiple
 * smaller interfaces that are specific to the needs of the clients.
 * This way, clients can implement only the interfaces they need,
 * reducing the impact of changes and making the code more maintainable.
 * Example:
 * A class that implements a large interface with many methods
 * should be split into smaller interfaces that are specific to the needs of the clients.
 * * This way, clients can implement only the interfaces they need,
 * * reducing the impact of changes and making the code more maintainable.
 * * This principle is part of the SOLID principles of object-oriented design.
 * * Example:
 * * - Printer interface has methods for printing and scanning.
 * * - Scanner interface has methods for scanning.
 * * This allows for easy maintenance and testing of each interface independently.
 * * @package InterfaceSegregationPrinciple
 * * @version 1.0
 * * @license MIT
 * * @author Your Name
 * * This code demonstrates the Interface Segregation Principle by defining multiple interfaces
 * * that are specific to the needs of the clients. The Printer class implements
 * * the PrinterInterface, while the Scanner class implements the ScannerInterface.
 * * * This allows clients to implement only the interfaces they need,
 * * reducing the impact of changes and making the code more maintainable.
 * * @see https://en.wikipedia.org/wiki/Interface_segregation_principle
 * * @see https://refactoring.guru/solid-principles#interface-segregation-principle
 * * * @see https://www.php.net/manual/en/language.oop5.interfaces.php
 * * @see https://www.php.net/manual/en/language.oop5.php
 * 
 */

interface PrinterInterface {
    public function printDocument(string $document): void;
    public function printPhoto(string $photo): void;
}

interface ScannerInterface {
    public function scanDocument(string $document): void;
    public function scanPhoto(string $photo): void;
}

class Printer implements PrinterInterface {
    public function printDocument(string $document): void {
        echo "Printing document: $document\n";
    }

    public function printPhoto(string $photo): void {
        echo "Printing photo: $photo\n";
    }
}

class Scanner implements ScannerInterface {
    public function scanDocument(string $document): void {
        echo "Scanning document: $document\n";
    }

    public function scanPhoto(string $photo): void {
        echo "Scanning photo: $photo\n";
    }
}

// Example usage
$printer = new Printer();   
$scanner = new Scanner();
$printer->printDocument("Report.pdf");
echo "<br>";
$printer->printPhoto("Image.jpg");
echo "<br>";
$scanner->scanDocument("Report.pdf");
echo "<br>";
$scanner->scanPhoto("Image.jpg");
// Output:
// Printing document: Report.pdf
// Printing photo: Image.jpg
// Scanning document: Report.pdf
// Scanning photo: Image.jpg
