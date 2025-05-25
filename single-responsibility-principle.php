<?php
/**
 * SOLID PRINCIPLE
 * Single Responsibility Principle (SRP)
 * A class should have only one reason to change, meaning that a class should only
 * have one job or responsibility.
 * This principle helps in reducing the complexity of the code and makes it easier
 * to maintain and test.
 * Example:
 * A class that handles user data should not also handle user authentication.
 * Instead, separate classes should be created for user data management and user authentication.
    * This way, if the user authentication logic changes, it won't affect the user data management logic.
    * This principle is part of the SOLID principles of object-oriented design.
    * Example:
    * - User class handles user data.
    * - UserAuthenticator class handles user authentication.
    * - UserDataManager class handles user data management.
    * This allows for easy maintenance and testing of each class independently.
    * @package SingleResponsibilityPrinciple
    * @version 1.0
    * @license MIT
    * @author Your Name
    * This code demonstrates the Single Responsibility Principle by defining a Report class
    * that encapsulates the data and behavior related to a report, and a ReportPrinter class
    * that is responsible for printing the report. Each class has a single responsibility,
    * making the code easier to maintain and test.
    * @see https://en.wikipedia.org/wiki/Single_responsibility_principle
    * @see https://refactoring.guru/solid-principles#single-responsibility-principle
    * @see https://www.php.net/manual/en/language.oop5.php
    * @see https://www.php.net/manual/en/language.oop5.interfaces.php
    
 */

 class Report {
    private $title;
    private $content;

    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }
 }

 class ReportPrinter {
    public function printReport(Report $report) {
        echo "Title: " . $report->getTitle() . "\n";
        echo "Content: " . $report->getContent() . "\n";
    }
 }

 $report = new Report("Monthly Report", "This is the content of the monthly report.");
 $printer = new ReportPrinter();
 $printer->printReport($report);
// Output: