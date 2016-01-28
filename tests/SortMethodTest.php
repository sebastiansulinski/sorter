<?php namespace SSDTest;

use SSD\Sorter\Sorter;

class SortMethodTest extends BaseCase
{
    /**
     * @test
     */
    public function simple_array_sort_ascending()
    {
        $sorter = new Sorter($this->simple_array());

        $this->assertSame(
            $this->simple_array_asc(),
            $sorter->sort('name')->collection()
        );
    }

    /**
     * @test
     */
    public function simple_array_sort_descending()
    {
        $sorter = new Sorter($this->simple_array());

        $this->assertSame(
            $this->simple_array_desc(),
            $sorter->sort('name', false)->collection()
        );
    }

    /**
     * @test
     */
    public function multi_dimensional_array_sort_ascending()
    {
        $sorter = new Sorter($this->multi_dimensional_array());

        $this->assertSame(
            $this->multi_dimensional_array_asc(),
            $sorter->sort(['person', 'name'])->collection()
        );
    }

    /**
     * @test
     */
    public function multi_dimensional_array_sort_descending()
    {
        $sorter = new Sorter($this->multi_dimensional_array());

        $this->assertSame(
            $this->multi_dimensional_array_desc(),
            $sorter->sort(['person', 'name'], false)->collection()
        );
    }

    /**
     * @test
     */
    public function object_sort_asc()
    {
        $sorter = new Sorter($this->objects_array());

        $this->assertEquals(
            $this->objects_array_asc(),
            $sorter->sort('name')->collection()
        );
    }

    /**
     * @test
     */
    public function object_sort_desc()
    {
        $sorter = new Sorter($this->objects_array());

        $this->assertEquals(
            $this->objects_array_desc(),
            $sorter->sort('name', false)->collection()
        );
    }

    /**
     * @test
     */
    public function embedded_object_sort_asc()
    {
        $sorter = new Sorter($this->embedded_objects_array());

        $this->assertEquals(
            $this->embedded_objects_array_asc(),
            $sorter->sort(['wallet', 'amount'])->collection()
        );
    }

    /**
     * @test
     */
    public function embedded_object_sort_desc()
    {
        $sorter = new Sorter($this->embedded_objects_array());

        $this->assertEquals(
            $this->embedded_objects_array_desc(),
            $sorter->sort(['wallet', 'amount'], false)->collection()
        );
    }
}