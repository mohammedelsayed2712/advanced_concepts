<?php
// echo "Hello World testing";

// class Transaction {

//     public const STATUS_PAID = "paid";
//     public const STATUS_PENDING = "pending";
//     public const STATUS_FAILED = "failed";

//     public function __construct(
//         private float $amount,
//         private string $description
//         ) {
//     }

//     public function addTax(float $rate)
//     {
//         $this->amount += $this->amount * $rate / 100;

//         return $this;
//     }

//     public function applyDescount(float $rate)
//     {
//         $this->amount -= $this->amount * $rate / 100;

//         return $this;
//     }

//     public function getAmount(): float {
//         return $this->amount;
//     }
// }

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

// function test(): void
// {
//     static $count = 0;

//     $count++;

//     echo $count . PHP_EOL;

//     if ($count < 5) {
//         test();
//     }
// }

// function test(): void
// {
//     static $x = 10;

//     echo $x;

//     $x = 50;
// }

// test();
// test();
// test();
// test();

// class User
// {
//     public static int $count = 0;

//     public function __construct()
//     {
//         self::$count++;
//     }
// }

// echo User::$count . PHP_EOL;
// echo User::$count . PHP_EOL;

// class ApiClient
// {
//     public static string $baseUrl = 'https://api.example.com';
// }

// echo ApiClient::$baseUrl . PHP_EOL;

// class BankAccount
// {
//     private float $balance = 1000;

//     public function getBalance(): float
//     {
//         return $this->balance;
//     }

//     public function deposit(float $amount): void
//     {
//         if ($amount <= 0) {
//             throw new InvalidArgumentException(
//                 'Deposit amount must be positive.'
//             );
//         }

//         $this->balance += $amount;
//     }
// }

// $account = new BankAccount();

// $account->deposit(500);

// echo $account->getBalance(); // 1500

// abstract class Field {
//     public function __construct(
//         protected string $name,
//     ) {}

//     abstract public function render(): string;
// }

// class TextField extends Field {
//     public function render(): string {
//         return "<input type='text' name='{$this->name}' placeholder='Enter {$this->name}'>";
//     }
// }

// $textField = new TextField('name');
// echo $textField->render();

// class BooleanField extends Field {
//     public function render(): string {
//         return "<input type='checkbox' name='{$this->name}'>";
//     }
// }

// $booleanField = new BooleanField('is_active');
// echo $booleanField->render();

// class CheckboxField extends BooleanField {
//     public function render(): string {
//         return "<input type='checkbox' name='{$this->name}[]'>";
//     }
// }

// $checkboxField = new CheckboxField('categories');
// echo $checkboxField->render();

// $fileds = [
//     // new Field('basename'),
//     new TextField('name'),
//     new BooleanField('is_active'),
//     new CheckboxField('categories')
// ];

// foreach ($fileds as $field) {
//     echo $field->render()."<br>";
// }

// abstract class Employee
// {
//     public function __construct(protected string $name)
//     {
//     }

//     abstract public function calculateSalary(): float;

//     public function getName(): string
//     {
//         return $this->name;
//     }
// }

// class Developer extends Employee
// {
//     public function __construct(string $name)
//     {
//         parent::__construct($name);
//     }

//     public function calculateSalary(): float
//     {
//         return 30000;
//     }
// }

// $developer = new Developer('Mohammed Elsayed');

// echo $developer->getName();
// echo $developer->calculateSalary();

// abstract class DocumentExporter
// {
//     abstract public function export();

//     public function validateData(){}
// }

// class CsvExporter extends DocumentExporter
// {
//     public function export()
//     {
//         echo "Exporting data to CSV format";
//     }
// }

// class JsonExporter extends DocumentExporter
// {
//     public function export()
//     {
//         echo "Exporting data to JSON format";
//     }
// }

// class XmlExporter extends DocumentExporter
// {
//     public function export()
//     {
//         echo "Exporting data to XML format";
//     }
// }

interface DebtCollector
{
    public function collect(float $owedAmount): float;
}

class collectonAgency implements DebtCollector
{
    public function collect(float $owedAmount): float
    {
        $guaranteedAmount = $owedAmount * 0.5;

        return mt_rand($guaranteedAmount, $owedAmount);
    }
}

// $collector = new collectonAgency();

// echo $collector->collect(1000).PHP_EOL;

class debtCollectionService
{
    public function collectDebt(collectonAgency $collector): float
    {
        $owedAmount = mt_rand(100, 1000);
        $collectedAmount = $collector->collect($owedAmount);

        echo "collected $'{$collectedAmount}' from a debt of $'{$owedAmount}'" . PHP_EOL;
    }
}

$service = new debtCollectionService();
echo $service->collectDebt(new collectonAgency());