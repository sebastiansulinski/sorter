<?php namespace SSDTest;

use SSD\Sorter\Sorter;

class DescMethodTest extends BaseCase
{
    /**
     * @test
     */
    public function simple_array_test()
    {
        $sorter = new Sorter($this->simple_array());

        $this->assertSame(
            $this->simple_array_desc(),
            $sorter->desc('name')->collection()
        );
    }

    /**
     * @test
     */
    public function multi_dimensional_array_test()
    {
        $sorter = new Sorter($this->multi_dimensional_array());

        $this->assertSame(
            $this->multi_dimensional_array_desc(),
            $sorter->desc(['person', 'name'])->collection()
        );
    }

    /**
     * @test
     */
    public function object_test()
    {
        $sorter = new Sorter($this->objects_array());

        $this->assertEquals(
            $this->objects_array_desc(),
            $sorter->desc('name')->collection()
        );
    }

    /**
     * @test
     */
    public function embedded_object_test()
    {
        $sorter = new Sorter($this->embedded_objects_array());

        $this->assertEquals(
            $this->embedded_objects_array_desc(),
            $sorter->desc(['wallet', 'amount'])->collection()
        );
    }
}