<?php

namespace AdventOfCode\Console\Command;

use AdventOfCode\Day1\Day1;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author: rogamoore <github@yoopee.de>
 */
class Day1Command extends Command
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('day1:puzzle1')
            ->setDescription('Run day 1 puzzle')
            ->addOption(
                'file',
                null,
                InputOption::VALUE_REQUIRED,
                'Please specify the input file'
            )
            ->addOption(
                'string',
                null,
                InputOption::VALUE_REQUIRED,
                'Please provide a string'
            );
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (null !== $filename = $input->getOption('file')) {
            if (file_exists($filename)) {
                $instructions = file_get_contents($filename);
            } else {
                $output->writeln('Unable to open file. Please check the path and make sure the file exists.');
                return;
            }
        } elseif (null === $instructions = $input->getOption('string')) {
            $output->writeln('Please provide either a string or a file using --string="xxx" or --file="/path/to/file"');
            return;
        }

        $output->writeln('DAY 1 - Puzzle 1');
        $output->writeln('Result: ' . Day1::calculateFloor($instructions));

        $output->writeln('DAY 1 - Puzzle 2');
        $output->writeln('Result: ' . Day1::calculateBasementEntry($instructions));

    }
}
