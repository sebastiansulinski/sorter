<?php namespace SSDTest\Mocks;

abstract class Person extends Model
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var Wallet
     */
    public $wallet;
}