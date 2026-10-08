<?php
// echo "Hello World testing";

class Transaction {

    public const STATUS_PAID = "paid";
    public const STATUS_PENDING = "pending";
    public const STATUS_FAILED = "failed";

    public function __construct(
        private float $amount,
        private string $description
        ) {
    }

    public function addTax(float $rate)
    {
        $this->amount += $this->amount * $rate / 100;

        return $this;
    }

    public function applyDescount(float $rate)
    {
        $this->amount -= $this->amount * $rate / 100;

        return $this;
    }

    public function getAmount(): float {
        return $this->amount;
    }
}

// $transaction = new Transaction(100, "test transaction");
// $class = Transaction::class;

// $transaction = (new Transaction(100, "test transaction"))
//                 ->addTax(8)
//                 ->applyDescount(10)
//                 ->getAmount();

// $transaction1 = (new $class(100, "test transaction"))
//                 ->addTax(8)
//                 ->applyDescount(10)
//                 ->getAmount();

// $transaction2 = (new $class(500, "test transaction"))
//                 ->addTax(8)
//                 ->applyDescount(30)
//                 ->getAmount();

// $transaction->addTax(8);
// $transaction->applyDescount(10);

// // $transaction->amount = 10;
// $transaction->description = "test";

// // echo $transaction;
// // var_dump($transaction->amount);

// var_dump($transaction1, $transaction2);

// $object = new stdClass();
// $object->name = "Mohammed";
// $object->age = 30;
// var_dump($object);

//  echo Transaction::STATUS_PAID;

// $transaction = new Transaction(100, "test transaction");

/**
 * @normal function
 * @param int $a
 * @param int $b
 * @return int
 */
// function counter(): void
// {
//     $count = 0;

//     $count++;

//     echo $count;
// }


/**
 * @static function
 * @param int $a
 * @param int $b
 * @return int
 */
// function counter(): void
// {
//     static $count = 0;

//     $count++;

//     echo $count;
// }


/**
 * @golbal function
 * @param int $a
 * @param int $b
 * @return int
 */
// $count = 0;

// function counter(): void
// {
//     global $count;

//     $count++;

//     echo $count;
// }

function test(): void
{
    static $count = 0;

    $count++;

    echo $count . PHP_EOL;

    if ($count < 5) {
        test();
    }
}

test();
// test();
// test();