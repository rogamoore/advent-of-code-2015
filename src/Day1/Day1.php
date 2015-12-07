<?php

/**
 * @package AdventOfCode\Day1
 * @author  rogamoore <github@yoopee.de>
 * @link http://adventofcode.com/day/1 --- Day 1: Not Quite Lisp ---
 */

namespace AdventOfCode\Day1;

/**
 * Class Day1
 * @package AdventOfCode\Day1
 */
class Day1
{
    /**
     * Charcode for '(' - means Santa goes one level up
     */
    const GO_UP = 40;
    /**
     * Charcode for ')' - means Santa goes one level down
     */
    const GO_DOWN = 41;
    /**
     * The number for the basement
     */
    const BASEMENT = -1;

    /**
     * Follows the instructions to calculate the floor reached by Santa
     *
     * @param string $instructions The instructions to use for the calculation
     * @return int The floor that has been reached
     */
    public static function calculateFloor($instructions)
    {
        $tokens = count_chars($instructions, 1);
        $ups = (isset($tokens[self::GO_UP]) ? $tokens[self::GO_UP] : 0) * 1;
        $downs = (isset($tokens[self::GO_DOWN]) ? $tokens[self::GO_DOWN] : 0) * -1;

        return $ups + $downs;
    }

    /**
     * Follows the instructions to calculate the position in the string when Santa reaches
     * the basement for the first time
     *
     * @param string $instructions The instructions to use for the calculation
     * @return int The position in the string when the basement was reached
     */
    public static function calculateBasementEntry($instructions)
    {
        $floor = $pos = 0;
        $tokens = str_split($instructions);

        while ($floor !== self::BASEMENT && $token = array_shift($tokens)) {
            $floor += $token === '(' ? 1 : ($token === ')' ? -1 : 0);
            $pos++;
        }

        return $floor === -1 ? $pos : 0;
    }

    /**
     * Shortest possible version?
     * @param string $i The instructions to use for the calculation
     * @return mixed The floor that has been reached
     */
    public static function calculateFloorAlternativeVersion($i)
    {
        return array_reduce(str_split($i),function($c,$i){return$c+=$i=='('?:-1;});
    }

    /**
     * Shortest possible version?
     * @param string $i The instructions to use for the calculation
     * @return int The position in the string when the basement was reached
     */
    public static function calculateBasementEntryAlternativeVersion($i)
    {
        foreach(str_split($i)as$p=>$v)if((@$f+=$v=='('?:-1)<0)break;return$f==-1?++$p:0;
        // even shorter but works only on the command line :)
        // foreach(str_split($argv[1])as$p=>$v)(@$f+=$v=='('?:-1)>-1||die(++$p.'');
    }

}
