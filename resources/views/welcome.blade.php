<?php

// class User
// {
//     public function __construct(
//         public readonly int $id,
//         public readonly string $name
//     ) {
//     }
// }


// $user = new User(1, "Ahmed");

// echo $user->id;   // 1
// echo $user->name; // Ahmed

// interface Logger
// {
//     public function log(string $message): void;
// }

// interface Cacheable
// {
//     public function cache(): void;
// }

// class UserService implements Logger, Cacheable
// {
//     public function log(string $message): void
//     {
//         echo $message;
//     }

//     public function cache(): void
//     {
//         echo "Caching user...";
//     }
// }

// function process(Logger&Cacheable $service): void
// {
//     $service->log("Processing...");
//     $service->cache();
// }

// $service = new UserService();

// process($service);

// class DocumentExporter
// {
//     public function export(): Document
//     {
//         return new Document();
//     }
// }

/*
* @params Covariance
*/

// class Animal
// {
//     public function speak(): string
//     {
//         return 'Some animal sound';
//     }
// }

// class Dog extends Animal
// {
//     public function speak(): string
//     {
//         return 'Woof!';
//     }
// }

// class AnimalShelter
// {
//     public function adopt(): Animal
//     {
//         return new Animal();
//     }
// }

// class DogShelter extends AnimalShelter
// {
//     public function adopt(): Dog
//     {
//         return new Dog();
//     }
// }

// $shelter = new DogShelter();
// $pet = $shelter->adopt();
// echo get_class($pet).PHP_EOL."<br>";
// echo $pet->speak()

/**
* @params Contravariance
*/
// class Animal
// {
//     public function eat(): string
//     {
//         return 'Animal is eating';
//     }
// }

// class Dog extends Animal
// {
//     public function bark(): string
//     {
//         return 'Woof!';
//     }
// }

// class AnimalTrainer
// {
//     public function train(Dog $dog): string
//     {
//         return 'Training a dog';
//     }
// }

// class GeneralAnimalTrainer extends AnimalTrainer
// {
//     public function train(Animal $animal): string
//     {
//         return 'Training an animal';
//     }
// }

// $trainer = new GeneralAnimalTrainer();
// echo $trainer->train(new Dog())."<br>";
// echo $trainer->train(new Animal());

/**
 * Combine both concepts in one PHP program
 */
class Animal {}

class Dog extends Animal {}

class Cat extends Animal {}

class AnimalService
{
    // Parent accepts a Dog.
    public function process(Dog $dog): Animal
    {
        return new Animal();
    }
}

class PetService extends AnimalService
{
    // Contravariance: accepts any Animal.
    // Covariance: returns a Dog.
    public function process(Animal $animal): Dog
    {
        return new Dog();
    }
}

$service = new PetService();
$dog = $service->process(new Dog());
$cat = $service->process(new Cat());

// echo get_class($dog)."<br>";
// echo get_class($cat);

interface PaymentResult {}

class SuccessfulPayment implements PaymentResult {}

class PaymentProcessor
{
    public function pay(): PaymentResult
    {
        return new SuccessfulPayment();
    }
}

class GeideaPaymentProcessor extends PaymentProcessor
{
    public function pay(): SuccessfulPayment
    {
        return new SuccessfulPayment();
    }
}