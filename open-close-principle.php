<?php
/**
 * Open/Closed Principle (OCP)
 * Software entities (classes, modules, functions, etc.) should be open for extension
 * but closed for modification.
 * This means that the behavior of a module can be extended without modifying its source code.
 * This principle helps in reducing the risk of introducing bugs when making changes to existing code.
 * Example:
 * * We can create new classes that implement a common interface or extend a base class
 * * to add new functionality without changing the existing code.
 * * In this example, we have a Shape interface and two classes (Circle and Rectangle)
 * * that implement this interface. The AreaCalculator class can calculate the area
 * * of any shape that implements the Shape interface without needing to know the details
 * * of each shape's implementation.
 * * This allows us to add new shapes in the future (e.g., Triangle, Square) without
 * * modifying the AreaCalculator class or the existing shape classes.
 * * This principle is part of the SOLID principles of object-oriented design.
 * * Example:
 * * - Shape interface defines a contract for calculating area.
 * * - Circle and Rectangle classes implement the Shape interface.
 * * - AreaCalculator class uses the Shape interface to calculate area without knowing
 * *   the specifics of each shape.
 * * This allows for easy extension by adding new shapes without modifying existing code.
 * * @package OpenClosedPrinciple
 * * @version 1.0
 * * @license MIT
 * * @author Your Name
 * * This code demonstrates the Open/Closed Principle by defining an interface for shapes
 * * and implementing it in different classes. The AreaCalculator class can calculate
 * * the area of any shape that implements the Shape interface without needing to know
 * * the details of each shape's implementation. This allows for easy extension by adding
 * * new shapes without modifying existing code.
 * * @see https://en.wikipedia.org/wiki/Open/closed_principle
 * * @see https://refactoring.guru/solid-principles#open-closed-principle
 * * @see https://www.php.net/manual/en/language.oop5.interfaces.php
 * * @see https://www.php.net/manual/en/language.oop5.php
 * 
 * 
 */

interface Shape {
    public function area(): float;
}

class Circle implements Shape {
    private float $radius;

    public function __construct(float $radius) {
        $this->radius = $radius;
    }

    public function area(): float {
        return pi() * $this->radius * $this->radius;
    }
}

class Rectangle implements Shape {
    private float $width;
    private float $height;

    public function __construct(float $width, float $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area(): float {
        return $this->width * $this->height;
    }
}

class AreaCalculator {
    public function calculateArea(Shape $shape): float {
        return $shape->area();
    }
}

$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);
$calculator = new AreaCalculator();
echo "Circle Area: " . $calculator->calculateArea($circle) . "<br>"; // Output: Circle Area: 78.53981633974483
echo "Rectangle Area: " . $calculator->calculateArea($rectangle) . "<br>"; // Output: Rectangle Area: 24