<?php

// $array1 = ['a' => 1, 2, 3, 4, 5];
// $array2 = [6, 7, 'a' => 8, 9, 10];

// // $array3 = array_merge($array1, $array2);
// $array3 = [...$array1, ...$array2];

// print_r($array3);

// What problem do enums solve?

// 1. Prevent typos
// class Order
// {
//     public string $status = 'pending';
// }

// $order = new Order();

// $order->status = 'delivered'; // Valid?
// $order->status = 'deliverd';  // Typo!
// $order->status = 'banana';    // Nonsense!

// print_r($order);

// 2. Prevent magic strings
// class Order
// {
//     public string $status = 'pending';
// }

//Step 2: Using constants

// class OrderStatus
// {
//     public const PENDING = 'pending';
//     public const PROCESSING = 'processing';
//     public const SHIPPED = 'shipped';
//     public const DELIVERED = 'delivered';
//     public const CANCELLED = 'cancelled';
// }

// $status = OrderStatus::PENDING;

// print_r($status);

// Step 3: Using an enum

// enum OrderStatus
// {
//     case Pending;
//     case Processing;
//     case Shipped;
//     case Delivered;
//     case Cancelled;
// }

// $status = OrderStatus::Processing


// enum TrafficLight
// {
//     case Red;
//     case Yellow;
//     case Green;
// }

// $red = TrafficLight::Red;
// $green = TrafficLight::Green;


// var_dump($red);
// echo $red->name;
// echo '<br>';
// var_dump($red === TrafficLight::Red); // true
// echo '<br>';
// var_dump($red === $green);            // false

/**
 * @param (Pure Enums)
 * Cases have names but no associated scalar values.
*/
// enum status {
//     case Pending;
//     case Complete;
// }

// /**
//  * @param (Backed Enums)
//  * Cases have associated string or integer values.
// */
// enum OrderStatus: string
// {
//     case Pending = 'pending';
//     case Complete = 'complete';
// }


// enum PaymentMethod
// {
//     case Cash;
//     case Card;
//     case BankTransfer;

//     public function label(): string
//     {
//         return match ($this) {
//             self::Cash => 'Cash payment',
//             self::Card => 'Credit or debit card',
//             self::BankTransfer => 'Bank transfer',
//         };
//     }
// }

// echo PaymentMethod::Card->label();
// $method = PaymentMethod::Card;

// if ($method === PaymentMethod::Card) {
//     echo 'Customer selected card payment.';
// }

// var_dump($method instanceof PaymentMethod); // true
// echo $method->name;

// function pay(PaymentMethod $method): void
// {
//     echo "Payment method: {$method->name}";
// }

// pay(PaymentMethod::Cash);
// pay(PaymentMethod::Card);


enum OrderStatus: string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Shipped = 'shipped';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';
}

$status = OrderStatus::Shipped;

echo $status->name.'<br>';
echo $status->value.'<br>';

enum HttpStatus: int
{
    case Ok = 200;
    case Created = 201;
    case BadRequest = 400;
    case Unauthorized = 401;
    case NotFound = 404;
    case InternalServerError = 500;
}

$status = HttpStatus::NotFound;

echo $status->name.'<br>';
echo $status->value.'<br>';
var_dump($status->value).'<br>';

$statusFromDatabase = 'shipped';
$status = OrderStatus::from('shipped');
var_dump($status === OrderStatus::Shipped).'<br>';
// $status = OrderStatus::from('unknown');