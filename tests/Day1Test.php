<?php

use AdventOfCode\Day1\Day1;

/**
 * Class Day1Test
 */
class Day1Test extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider calculateFloorInputProvider
     */
    public function testCalculateFloor($input, $expected)
    {
        $this->assertEquals($expected, Day1::calculateFloor($input));
    }

    /**
     * @dataProvider calculateFloorInputProvider
     */
    public function testCalculateFloorAlternativeVersion($input, $expected)
    {
        $this->assertEquals($expected, Day1::calculateFloorAlternativeVersion($input));
    }

    /**
     * @dataProvider calculateBasementEntryInputProvider
     */
    public function testCalculateBasementEntry($input, $expected)
    {
        $this->assertEquals($expected, Day1::calculateBasementEntry($input));
    }

    /**
     * @dataProvider calculateBasementEntryInputProvider
     */
    public function testCalculateBasementEntryAlternativeVersion($input, $expected)
    {
        $this->assertEquals($expected, Day1::calculateBasementEntryAlternativeVersion($input));
    }

    /**
     * @return array
     */
    public function calculateFloorInputProvider()
    {
        return array(
            ['(())', 0],
            ['()()', 0],
            ['(((', 3],
            ['(()(()(', 3],
            ['))(((((', 3],
            ['())', -1],
            ['))(', -1],
            [')))', -3],
            [')())())', -3],
        );
    }

    /**
     * @return array
     */
    public function calculateBasementEntryInputProvider()
    {
        return array(
            ['(())', 0],
            ['()()', 0],
            ['(((', 0],
            ['(()(()(', 0],
            ['))(((((', 1],
            ['())', 3],
            ['))(', 1],
            [')))', 1],
            [')())())', 1],
        );
    }
}