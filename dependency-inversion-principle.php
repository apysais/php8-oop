<?php
/**
 * SOLID Principles - Dependency Inversion Principle
 * A high-level module should not depend on low-level modules.
 * Both should depend on abstractions.
 * Abstractions should not depend on details. Details should depend on abstractions.
 * This principle helps in reducing the coupling between high-level and low-level modules,
 * making the code more flexible and easier to maintain.
 * Example:
 * A class that handles user data should not directly depend on a database class.
 * Instead, it should depend on an interface that defines the methods for data access.
 * This way, if the data access implementation changes (e.g., switching from a database to an API),
 * the high-level class does not need to change.
 * * This principle is part of the SOLID principles of object-oriented design.
 * * Example:
 * * - UserDataManager class handles user data.
 * * - UserRepository interface defines methods for data access.
 * * * - DatabaseUserRepository class implements UserRepository for database access.
 * * * - ApiUserRepository class implements UserRepository for API access.
 * * * This allows for easy maintenance and testing of each module independently.
 * * @package DependencyInversionPrinciple
 * * @version 1.0
 * * @license MIT
 * * @author Your Name
 * * This code demonstrates the Dependency Inversion Principle by defining an interface for user data access
 * * and implementing it in different classes. The UserDataManager class depends on the UserRepository interface,
 * * allowing it to work with any implementation of the interface (e.g., DatabaseUserRepository, ApiUserRepository).
 * * * This allows for easy extension by adding new data access implementations without modifying existing code.
 * * * @see https://en.wikipedia.org/wiki/Dependency_inversion_principle
 * * * @see https://refactoring.guru/solid-principles#dependency-inversion-principle
 * * * @see https://www.php.net/manual/en/language.oop5.interfaces.php
 * * * @see https://www.php.net/manual/en/language.oop5.php
 * 
 */

interface UserRepository {
    public function getUserById(int $id): array;
    public function saveUser(array $user): void;
}

class DatabaseUserRepository implements UserRepository {
    public function getUserById(int $id): array {
        // Simulate database access
        return ['id' => $id, 'name' => 'John Doe', 'email' => 'john@mail.com'];
    }
    public function saveUser(array $user): void {
        // Simulate saving user to database
        echo "User saved to database: " . json_encode($user) . "\n";
    }
}

class ApiUserRepository implements UserRepository {
    public function getUserById(int $id): array {
        // Simulate API access
        return ['id' => $id, 'name' => 'Jane Doe', 'email' => 'jane@mail.com'];
    }
    public function saveUser(array $user): void {
        // Simulate saving user via API
        echo "User saved via API: " . json_encode($user) . "\n";
    }
}
class UserDataManager {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getUser(int $id): array {
        return $this->userRepository->getUserById($id);
    }

    public function saveUser(array $user): void {
        $this->userRepository->saveUser($user);
    }
}
// Example usage
$databaseRepo = new DatabaseUserRepository();
$apiRepo = new ApiUserRepository();
$manager = new UserDataManager($databaseRepo);
$user = $manager->getUser(1);
echo "User from database: " . json_encode($user) . "<br>";
$manager->saveUser(['id' => 1, 'name' => 'John Doe', 'email' => 'john@mailcom']);
$manager = new UserDataManager($apiRepo);
$user = $manager->getUser(2);
echo "User from API: " . json_encode($user) . "<br>";
$manager->saveUser(['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@mailcom']);
