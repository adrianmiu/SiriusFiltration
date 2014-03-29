<?php

namespace Sirius\Filtration;

class FilterSetTest extends \PHPUnit_Framework_TestCase {
    
    function setUp() {
        $this->filterset = new FilterSet();
    }

    function testInsert() {
        $this->filterset->insert(new Filter\StringTrim(), 0);
        $this->filterset->insert(new Filter\Nullify(), 0);        
        $this->assertFalse($this->filterset->isEmpty());
        $this->assertEquals(2, count($this->filterset));
    }
    
    function testInsertTheSameFilter() {
        $this->filterset->insert(new Filter\StringTrim(), 0);
        $this->filterset->insert(new Filter\StringTrim(), 0);
        $this->assertFalse($this->filterset->isEmpty());
        $this->assertEquals(1, count($this->filterset));
    }
    
}