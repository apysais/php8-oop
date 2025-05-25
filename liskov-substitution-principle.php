<?php
/**
 * Liskov Substitution Principle (LSP)
 * Objects of a superclass should be replaceable with objects of a subclass
 * without affecting the correctness of the program.
 * This means that subclasses should extend the behavior of the superclass
 * without changing its expected behavior.
 * This principle helps in ensuring that a subclass can stand in for its superclass
 * without causing issues in the code that uses the superclass.
    * Example:
    * A class that represents a bird should be able to be replaced with any subclass
    * that represents a specific type of bird, such as a sparrow or a penguin,
    * without affecting the code that uses the bird class.
 * This principle is part of the SOLID principles of object-oriented design.
 * Example:
 * - Bird class represents a generic bird.
 * - Sparrow and Penguin classes extend the Bird class.
 * - BirdWatcher class can observe any bird without needing to know the specifics of each bird type.
 * * This allows for easy extension by adding new bird types without modifying existing code.
 * * @package LiskovSubstitutionPrinciple
 * * @version 1.0
 * * @license MIT
 * * @author Your Name
 * * This code demonstrates the Liskov Substitution Principle by defining an interface for birds
 * * and implementing it in different classes. The BirdWatcher class can observe any bird
 * * that implements the Bird interface without needing to know the details of each bird's implementation.
 * * * This allows for easy extension by adding new bird types without modifying existing code.
 * * @see https://en.wikipedia.org/wiki/Liskov_substitution_principle
 * * @see https://refactoring.guru/solid-principles#liskov-substitution-principle
 * * @see https://www.php.net/manual/en/language.oop5.interfaces.php
 * * @see https://www.php.net/manual/en/language.oop5.php
 */

interface Bird {
    public function fly(): string;
    public function makeSound(): string;
}

class Sparrow implements Bird {
    public function fly(): string {
        return "Sparrow is flying.";
    }

    public function makeSound(): string {
        return "Chirp chirp!";
    }
}

class Penguin implements Bird {
    public function fly(): string {
        throw new Exception("Penguins can't fly.");
    }

    public function makeSound(): string {
        return "Honk honk!";
    }
}

class BirdWatcher {
    public function observe(Bird $bird): void {
        echo $bird->fly() . "<br>";
        echo $bird->makeSound() . "<br>";
    }
}

$sparrow = new Sparrow();
$penguin = new Penguin();
$watcher = new BirdWatcher();
try {
    $watcher->observe($sparrow); // Output: Sparrow is flying. Chirp chirp!
    $watcher->observe($penguin); // Throws exception
} catch (Exception $e) {
    echo $e->getMessage(); // Output: Penguins can't fly.
}