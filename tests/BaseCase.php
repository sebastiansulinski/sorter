<?php namespace SSDTest;

use PHPUnit_Framework_TestCase;

use SSDTest\Mocks\Student;
use SSDTest\Mocks\Tutor;
use SSDTest\Mocks\Staff;
use SSDTest\Mocks\Wallet;

abstract class BaseCase extends PHPUnit_Framework_TestCase
{
    /**
     * Get simple array.
     *
     * @return array
     */
    protected function simple_array()
    {
        return [
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
    }

    /**
     * Get simple array sorted in the ascending order.
     *
     * @return array
     */
    protected function simple_array_asc()
    {
        return [
            [
                'name' => 'Arthur'
            ],
            [
                'name' => 'Mark'
            ],
            [
                'name' => 'Tom'
            ]
        ];
    }

    /**
     * Get simple array sorted in the descending order.
     *
     * @return array
     */
    protected function simple_array_desc()
    {
        return [
            [
                'name' => 'Tom'
            ],
            [
                'name' => 'Mark'
            ],
            [
                'name' => 'Arthur'
            ]
        ];
    }

    /**
     * Get multi-dimensional array.
     *
     * @return array
     */
    protected function multi_dimensional_array()
    {
        return [
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
    }

    /**
     * Get multi-dimensional array sorted in the ascending order.
     *
     * @return array
     */
    protected function multi_dimensional_array_asc()
    {
        return [
            [
                'person' => [
                    'name' => 'Arthur'
                ]
            ],
            [
                'person' => [
                    'name' => 'Mark'
                ]
            ],
            [
                'person' => [
                    'name' => 'Tom'
                ]
            ]
        ];
    }

    /**
     * Get multi-dimensional array sorted in the descending order.
     *
     * @return array
     */
    protected function multi_dimensional_array_desc()
    {
        return [
            [
                'person' => [
                    'name' => 'Tom'
                ]
            ],
            [
                'person' => [
                    'name' => 'Mark'
                ]
            ],
            [
                'person' => [
                    'name' => 'Arthur'
                ]
            ]
        ];
    }

    /**
     * Get array of objects.
     *
     * @return array
     */
    protected function objects_array()
    {
        return [
            new Tutor(['name' => 'John']),
            new Tutor(['name' => 'Craig']),
            new Student(['name' => 'Marcus']),
            new Student(['name' => 'George']),
            new Student(['name' => 'Albert']),
            new Student(['name' => 'Tony']),
            new Staff(['name' => 'Greg']),
            new Staff(['name' => 'Antony'])
        ];
    }

    /**
     * Get array of objects sorted in the ascending order
     * of the property 'name'
     *
     * @return array
     */
    protected function objects_array_asc()
    {
        return [
            new Student(['name' => 'Albert']),
            new Staff(['name' => 'Antony']),
            new Tutor(['name' => 'Craig']),
            new Student(['name' => 'George']),
            new Staff(['name' => 'Greg']),
            new Tutor(['name' => 'John']),
            new Student(['name' => 'Marcus']),
            new Student(['name' => 'Tony'])
        ];
    }

    /**
     * Get array of objects sorted in the descending order
     * of the property 'name'
     *
     * @return array
     */
    protected function objects_array_desc()
    {
        return [
            new Student(['name' => 'Tony']),
            new Student(['name' => 'Marcus']),
            new Tutor(['name' => 'John']),
            new Staff(['name' => 'Greg']),
            new Student(['name' => 'George']),
            new Tutor(['name' => 'Craig']),
            new Staff(['name' => 'Antony']),
            new Student(['name' => 'Albert'])
        ];
    }

    /**
     * Get array of objects.
     *
     * @return array
     */
    protected function embedded_objects_array()
    {
        return [
            new Tutor([
                'name' => 'John',
                'wallet' => new Wallet(['amount' => 10])
            ]),
            new Tutor([
                'name' => 'Craig',
                'wallet' => new Wallet(['amount' => 12])
            ]),
            new Student([
                'name' => 'Marcus',
                'wallet' => new Wallet(['amount' => 13])
            ]),
            new Student([
                'name' => 'George',
                'wallet' => new Wallet(['amount' => 21])
            ]),
            new Student([
                'name' => 'Albert',
                'wallet' => new Wallet(['amount' => 36])
            ]),
            new Student([
                'name' => 'Tony',
                'wallet' => new Wallet(['amount' => 50])
            ]),
            new Staff([
                'name' => 'Greg',
                'wallet' => new Wallet(['amount' => 22])
            ]),
            new Staff([
                'name' => 'Antony',
                'wallet' => new Wallet(['amount' => 31])
            ])
        ];
    }

    /**
     * Get array of objects sorted in the ascending order
     * of the property 'name' on the embedded object
     *
     * @return array
     */
    protected function embedded_objects_array_asc()
    {
        return [
            new Tutor([
                'name' => 'John',
                'wallet' => new Wallet(['amount' => 10])
            ]),
            new Tutor([
                'name' => 'Craig',
                'wallet' => new Wallet(['amount' => 12])
            ]),
            new Student([
                'name' => 'Marcus',
                'wallet' => new Wallet(['amount' => 13])
            ]),
            new Student([
                'name' => 'George',
                'wallet' => new Wallet(['amount' => 21])
            ]),
            new Staff([
                'name' => 'Greg',
                'wallet' => new Wallet(['amount' => 22])
            ]),
            new Staff([
                'name' => 'Antony',
                'wallet' => new Wallet(['amount' => 31])
            ]),
            new Student([
                'name' => 'Albert',
                'wallet' => new Wallet(['amount' => 36])
            ]),
            new Student([
                'name' => 'Tony',
                'wallet' => new Wallet(['amount' => 50])
            ])
        ];
    }

    /**
     * Get array of objects sorted in the descending order
     * of the property 'name' on the embedded object
     *
     * @return array
     */
    protected function embedded_objects_array_desc()
    {
        return [
            new Student([
                'name' => 'Tony',
                'wallet' => new Wallet(['amount' => 50])
            ]),
            new Student([
                'name' => 'Albert',
                'wallet' => new Wallet(['amount' => 36])
            ]),
            new Staff([
                'name' => 'Antony',
                'wallet' => new Wallet(['amount' => 31])
            ]),
            new Staff([
                'name' => 'Greg',
                'wallet' => new Wallet(['amount' => 22])
            ]),
            new Student([
                'name' => 'George',
                'wallet' => new Wallet(['amount' => 21])
            ]),
            new Student([
                'name' => 'Marcus',
                'wallet' => new Wallet(['amount' => 13])
            ]),
            new Tutor([
                'name' => 'Craig',
                'wallet' => new Wallet(['amount' => 12])
            ]),
            new Tutor([
                'name' => 'John',
                'wallet' => new Wallet(['amount' => 10])
            ])
        ];
    }
}