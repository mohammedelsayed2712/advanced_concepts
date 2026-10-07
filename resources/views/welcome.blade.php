<?php
// echo "Hello World testing";

class Transaction {
    private float $amount;
    private string $description;

    public function __construct($amount, $description ) {
        $this->amount = $amount;
        $this->description = $description;
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
$class = Transaction::class;

// $transaction = (new Transaction(100, "test transaction"))
//                 ->addTax(8)
//                 ->applyDescount(10)
//                 ->getAmount();

$transaction1 = (new $class(100, "test transaction"))
                ->addTax(8)
                ->applyDescount(10)
                ->getAmount();

$transaction2 = (new $class(500, "test transaction"))
                ->addTax(8)
                ->applyDescount(30)
                ->getAmount();

// $transaction->addTax(8);
// $transaction->applyDescount(10);

// // $transaction->amount = 10;
// $transaction->description = "test";

// // echo $transaction;
// // var_dump($transaction->amount);

var_dump($transaction1, $transaction2);