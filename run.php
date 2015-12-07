<?php
/**
 * Run "Advent of Code" solutions via console commands
 *
 * @package AdventOfCode
 * @author rogamoore <github@yoopee.de>
 * @link http://adventofcode.com/
 */

require __DIR__ . '/vendor/autoload.php';

use AdventOfCode\Console\Command\Day1Command;
use Symfony\Component\Console\Application;

$app = new Application();
$app->add(new Day1Command());
$app->run();