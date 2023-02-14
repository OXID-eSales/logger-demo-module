<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\LoggerDemo\Command;

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\EventLoggerDemo\BasketItemLogger;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReadLogsCommand extends Command
{
    protected function configure()
    {
        $this->setName('oe:loggerdemo:read-log-file')
            ->setDescription('Log file reader.')
            ->setHelp('Reads log file and outputs content.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = Registry::getConfig()->getLogsDir() . '/' . BasketItemLogger::FILE_NAME;
        if (file_exists($filePath)) {
            $fileContents = file_get_contents($filePath);
            $output->writeln('Log file content:');
            $output->writeln($fileContents);
        } else {
            $output->writeln('<error>Log file - ' . $filePath . ' was not found</error>');
        }
    }
}
