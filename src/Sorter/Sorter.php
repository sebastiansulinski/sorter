<?php namespace SSD\Sorter;

use InvalidArgumentException;

class Sorter
{
    /**
     * @var array
     */
    private $collection;

    /**
     * @var array
     */
    private $fields;

    /**
     * @var bool
     */
    private $ascending;

    /**
     * Sorter constructor.
     * @param array $collection
     */
    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    /**
     * Sort collection.
     *
     * @param $fields
     * @param bool $ascending
     * @return $this
     */
    public function sort($fields, $ascending = true)
    {
        $this->fields = (array) $fields;
        $this->ascending = (bool) $ascending;

        usort($this->collection, [$this, 'compare']);

        return $this;
    }

    /**
     * Sort collection in the ascending order.
     *
     * @param $fields
     * @return Sorter
     */
    public function asc($fields)
    {
        return $this->sort($fields);
    }

    /**
     * Sort collection in the descending order.
     *
     * @param $fields
     * @return Sorter
     */
    public function desc($fields)
    {
        return $this->sort($fields, false);
    }

    /**
     * Get collection.
     *
     * @return mixed
     */
    public function collection()
    {
        return $this->collection;
    }

    /**
     * Compare two items.
     *
     * @param $a
     * @param $b
     * @return bool
     */
    private function compare($a, $b)
    {
        if (gettype($a) !== gettype($b)) {
            throw new InvalidArgumentException(
                "Items in the provided collection have to be of the same type"
            );
        }

        if (is_array($a)) {
            return $this->compareKey($a, $b);
        }

        return $this->compareProperty($a, $b);
    }

    /**
     * Compare two arrays by given key value.
     *
     * @param $a
     * @param $b
     * @return bool
     */
    private function compareKey(array $a, array $b)
    {
        $a_value = $this->arrayValue($a, $this->fields);
        $b_value = $this->arrayValue($b, $this->fields);

        if ($this->ascending) {
            return $a_value > $b_value;
        }

        return $a_value < $b_value;
    }

    /**
     * Get array value by index(es).
     *
     * @param $array
     * @param $indexes
     * @return mixed
     */
    public function arrayValue(array $array, $indexes)
    {
        if (count($indexes) == 1) {
            return $array[$indexes[0]];
        }

        $index = array_shift($indexes);

        return $this->arrayValue($array[$index], $indexes);
    }

    /**
     * Compare two objects by a property.
     *
     * @param $a
     * @param $b
     * @return bool
     */
    private function compareProperty($a, $b)
    {
        $a_value = $this->objectValue($a, $this->fields);
        $b_value = $this->objectValue($b, $this->fields);

        if ($this->ascending) {
            return $a_value > $b_value;
        }

        return $a_value < $b_value;
    }

    /**
     * Get value associated with the object's property.
     *
     * @param $object
     * @param $indexes
     * @return mixed
     */
    public function objectValue($object, $indexes)
    {
        if (count($indexes) == 1) {
            return $object->{$indexes[0]};
        }

        $index = array_shift($indexes);

        return $this->objectValue($object->{$index}, $indexes);
    }

    /**
     * Print array as string.
     *
     * @return string
     */
    public function printR()
    {
        ob_start();
        echo '<pre>';
        print_r($this->collection);
        echo '</pre>';
        return ob_get_clean();
    }

    /**
     * Return object as string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->printR();
    }
}