<?php

class Animal
{
    public function eat(): void
    {
        echo "Animal is eating.". "<br>";
    }
}

class Dog extends Animal
{
    public function bark(): void
    {
        echo "Dog is barking.". "<br>";
    }
}

$dog = new Dog();
$dog->eat();
$dog->bark();

class Engine
{
    public function start(): void
    {
        echo "Engine started."."<br>";
    }
}

class Car
{
    public function __construct(
        private Engine $engine
    ) {}

    public function start(): void
    {
        $this->engine->start();

        echo "Car is ready to drive."."<br>";
    }
}

$engine = new Engine();
$car = new Car($engine);
$car->start();
echo "<br>";

interface MessageSender
{
    public function send(string $message): void;
}

class EmailSender implements MessageSender
{
    public function send(string $message): void
    {
        echo "Email: {$message}\n";
    }
}

class SmsSender implements MessageSender
{
    public function send(string $message): void
    {
        echo "SMS: {$message}\n";
    }
}

class whatsappSender implements MessageSender
{
    public function send(string $message): void
    {
        echo "whatsapp: {$message}\n";
    }
}

class NotificationService
{
    public function __construct(
        private MessageSender $sender
    ) {}

    public function notify(string $message): void
    {
        $this->sender->send($message);
    }
}

$emailService = new NotificationService(new EmailSender());
$smsService = new NotificationService(new SmsSender());
$whatsappService = new NotificationService(new whatsappSender());

$emailService->notify("Welcome!");
$smsService->notify("Your OTP is 123456.");
$whatsappService->notify("Hello!");



// abstract class PaymentGateway
// {
//     public function logPayment(float $amount): void
//     {
//         echo "Logging payment: {$amount}\n";
//     }

//     abstract public function pay(float $amount): void;
// }

// class GeideaGateway extends PaymentGateway
// {
//     public function pay(float $amount): void
//     {
//         echo "Processing Geidea payment: {$amount}\n";
//     }
// }

// class StripeGateway extends PaymentGateway
// {
//     public function pay(float $amount): void
//     {
//         echo "Processing Stripe payment: {$amount}\n";
//     }
// }

interface PaymentGatewayInterface
{
    public function pay(float $amount): void;
}


class GeideaGateway implements PaymentGatewayInterface
{
    public function pay(float $amount): void
    {
        echo "Paying through Geidea: {$amount}\n";
    }
}

class StripeGateway implements PaymentGatewayInterface
{
    public function pay(float $amount): void
    {
        echo "Paying through Stripe: {$amount}\n";
    }
}

class PaymentService
{
    public function __construct(
        private PaymentGatewayInterface $gateway
    ) {}

    public function checkout(float $amount): void
    {
        $this->gateway->pay($amount);
    }
}

$paymentService = new PaymentService(new GeideaGateway());
echo "<br>";
$paymentService->checkout(100.0);

$paymentService = new PaymentService(new StripeGateway());
echo "<br>";
$paymentService->checkout(150.0);
echo "<br>";

interface NotificationChannel
{
    public function send(string $message): void;
}

class EmailChannel implements NotificationChannel {
    public function send(string $message): void {
        echo "Sending email: {$message}\n";
    }
}

class SmsChannel implements NotificationChannel {
    public function send(string $message): void {
        echo "Sending SMS: {$message}\n";
    }
}

class NotificationsService
{
    public function __construct(
        private NotificationChannel $channel
    ) {}

    public function notify(string $message): void {
        $this->channel->send($message);
    }
}

$email = new NotificationsService(new EmailChannel());
$email->notify("Hello");

$sms = new NotificationsService(new SmsChannel());
$sms->notify("Your OTP is 123456.");