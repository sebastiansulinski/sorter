# Sorter

This package allows you to sort multidimensional arrays and objects.

## Installation

Install package via composer

```
composer require sebastiansulinski/sorter
```

## Usage instructions

### 1. Simple array

```
$array = [
    [
        'name' => 'Arthur'
    ],
    [
        'name' => 'Tom'
    ],
    [
        'name' => 'Mark'
    ]
];

$sorter = new Sorter($array);

// sort the array by 'name' key
$sorter->asc('name');

// two ways of printing array
echo $sorter->printR();
echo $sorter;

// get resulting, previously sorted array
$array_sorted_asc = $sorter->collection();

// reverse order and return the resulting array
$array_sorted_desc = $sorter->desc('name')->collection();
```

Result for the above would be

```
// $array_sorted_asc

Array
(
    [0] => Array
        (
            [name] => Arthur
        )

    [1] => Array
        (
            [name] => Mark
        )

    [2] => Array
        (
            [name] => Tom
        )

)

// $array_sorted_desc

Array
(
    [0] => Array
        (
            [name] => Tom
        )

    [1] => Array
        (
            [name] => Mark
        )

    [2] => Array
        (
            [name] => Arthur
        )

)
```

### 2. Multidimensional array

```
$array = [
    [
        'person' => [
            'name' => 'Arthur'
        ]
    ],
    [
        'person' => [
            'name' => 'Tom'
        ]
    ],
    [
        'person' => [
            'name' => 'Mark'
        ]
    ]
];

$sorter = new Sorter($array);

// sort ascending by child 'name' key
$array_sorted_asc = $sorter->asc(['person', 'name'])->collection();

// sort descending by child 'name' key
$array_sorted_desc = $sorter->desc(['person', 'name'])->collection();
```

Result

```
// $array_sorted_asc

Array
(
    [0] => Array
        (
            [person] => Array
                (
                    [name] => Arthur
                )

        )

    [1] => Array
        (
            [person] => Array
                (
                    [name] => Mark
                )

        )

    [2] => Array
        (
            [person] => Array
                (
                    [name] => Tom
                )

        )

)

// $array_sorted_desc

Array
(
    [0] => Array
        (
            [person] => Array
                (
                    [name] => Tom
                )

        )

    [1] => Array
        (
            [person] => Array
                (
                    [name] => Mark
                )

        )

    [2] => Array
        (
            [person] => Array
                (
                    [name] => Arthur
                )

        )

)
```

### 3. Objects

For the purpose of this exercise let's assume we have 3 classes with 2 properties:

- name : string
- wallet : Wallet

and `Wallet` class with one property:

- amount : int

First let's try and sort the 3 instances of the objects by their `name` property

```
$collection[] = new Tutor(['name' => 'John']);
$collection[] = new Tutor(['name' => 'Craig']);

$collection[] = new Student(['name' => 'Marcus']);
$collection[] = new Student(['name' => 'George']);
$collection[] = new Student(['name' => 'Albert']);
$collection[] = new Student(['name' => 'Tony']);

$collection[] = new Staff(['name' => 'Greg']);
$collection[] = new Staff(['name' => 'Antony']);

$sorter = new Sorter($collection);

// sort ascending by child 'name' property
$array_sorted_asc = $sorter->asc('name')->collection();

// sort descending by child 'name' property
$array_sorted_desc = $sorter->desc('name')->collection();
```

Result for `$array_sorted_asc`

```
Array
(
    [0] => SSD\Student Object
        (
            [name] => Albert
            [wallet] =>
        )

    [1] => SSD\Staff Object
        (
            [name] => Antony
            [wallet] =>
        )

    [2] => SSD\Tutor Object
        (
            [name] => Craig
            [wallet] =>
        )

    [3] => SSD\Student Object
        (
            [name] => George
            [wallet] =>
        )

    [4] => SSD\Staff Object
        (
            [name] => Greg
            [wallet] =>
        )

    [5] => SSD\Tutor Object
        (
            [name] => John
            [wallet] =>
        )

    [6] => SSD\Student Object
        (
            [name] => Marcus
            [wallet] =>
        )

    [7] => SSD\Student Object
        (
            [name] => Tony
            [wallet] =>
        )

)
```

and result for `$array_sorted_desc`

```
Array
(
    [0] => SSD\Student Object
        (
            [name] => Tony
            [wallet] =>
        )

    [1] => SSD\Student Object
        (
            [name] => Marcus
            [wallet] =>
        )

    [2] => SSD\Tutor Object
        (
            [name] => John
            [wallet] =>
        )

    [3] => SSD\Staff Object
        (
            [name] => Greg
            [wallet] =>
        )

    [4] => SSD\Student Object
        (
            [name] => George
            [wallet] =>
        )

    [5] => SSD\Tutor Object
        (
            [name] => Craig
            [wallet] =>
        )

    [6] => SSD\Staff Object
        (
            [name] => Antony
            [wallet] =>
        )

    [7] => SSD\Student Object
        (
            [name] => Albert
            [wallet] =>
        )

)
```

### 4. Properties of the object property

Sorter allows you to sort objects based on the value associated with properties of the internal / embedded objects.

Our 3 classes have a property called `wallet`, which is of the `Wallet` object type. Let's try and sort our 3 objects using the property `amount` of the `Wallet` object.

```
$collection[] = new Tutor([
    'name' => 'John',
    'wallet' => new Wallet(['amount' => 10])
]);
$collection[] = new Tutor([
    'name' => 'Craig',
    'wallet' => new Wallet(['amount' => 12])
]);

$collection[] = new Student([
    'name' => 'Marcus',
    'wallet' => new Wallet(['amount' => 13])
]);
$collection[] = new Student([
    'name' => 'George',
    'wallet' => new Wallet(['amount' => 21])
]);
$collection[] = new Student([
    'name' => 'Albert',
    'wallet' => new Wallet(['amount' => 36])
]);
$collection[] = new Student([
    'name' => 'Tony',
    'wallet' => new Wallet(['amount' => 50])
]);

$collection[] = new Staff([
    'name' => 'Greg',
    'wallet' => new Wallet(['amount' => 22])
]);
$collection[] = new Staff([
    'name' => 'Antony',
    'wallet' => new Wallet(['amount' => 31])
]);

$sorter = new Sorter($collection);

// sort ascending by 'amount' property of the embedded object
$array_sorted_asc = $sorter->asc(['wallet', 'amount'])->collection();

// sort descending by 'amount' property of the embedded object
$array_sorted_desc = $sorter->desc(['wallet', 'amount'])->collection();
```

Result for `$array_sorted_asc`

```
Array
(
    [0] => SSD\Tutor Object
        (
            [name] => John
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 10
                )

        )

    [1] => SSD\Tutor Object
        (
            [name] => Craig
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 12
                )

        )

    [2] => SSD\Student Object
        (
            [name] => Marcus
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 13
                )

        )

    [3] => SSD\Student Object
        (
            [name] => George
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 21
                )

        )

    [4] => SSD\Staff Object
        (
            [name] => Greg
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 22
                )

        )

    [5] => SSD\Staff Object
        (
            [name] => Antony
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 31
                )

        )

    [6] => SSD\Student Object
        (
            [name] => Albert
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 36
                )

        )

    [7] => SSD\Student Object
        (
            [name] => Tony
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 50
                )

        )

)
```

and result for `$array_sorted_desc`

```
Array
(
    [0] => SSD\Student Object
        (
            [name] => Tony
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 50
                )

        )

    [1] => SSD\Student Object
        (
            [name] => Albert
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 36
                )

        )

    [2] => SSD\Staff Object
        (
            [name] => Antony
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 31
                )

        )

    [3] => SSD\Staff Object
        (
            [name] => Greg
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 22
                )

        )

    [4] => SSD\Student Object
        (
            [name] => George
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 21
                )

        )

    [5] => SSD\Student Object
        (
            [name] => Marcus
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 13
                )

        )

    [6] => SSD\Tutor Object
        (
            [name] => Craig
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 12
                )

        )

    [7] => SSD\Tutor Object
        (
            [name] => John
            [wallet] => SSD\Wallet Object
                (
                    [amount] => 10
                )

        )

)
```