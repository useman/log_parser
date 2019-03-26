<?php

namespace App;

use App\Formats\FormatAbstract;
use App\Interfaces\AnalyticInterface;
use App\Interfaces\FormatableInterface;
use App\Interfaces\FormatInterface;
use App\Traits\InitiableTrait;

class App
{

    use InitiableTrait;

    /**
     * Path to file
     *
     * @var string
     */
    private $pathToFile;

    /**
     * Config
     *
     * @var array
     */
    private $config;

    /**
     * @var AnalyticInterface[]|FormatableInterface[]
     */
    private $analytics = [];

    public function __construct(string $pathToFile, array $config)
    {
        $this->pathToFile = $pathToFile;
        $this->config = $config;
    }

    /**
     * @throws \App\Exceptions\ErrorClassDoesNotImplement
     * @throws \App\Exceptions\ErrorClassDoesNotExist
     */
    public function parse(): void
    {
        $this->analytics = $this->initMultiple(AnalyticInterface::class, $this->config['analytics']);

        foreach ($this->readFile() as $line) {
            foreach ($this->analytics as $analytic) {
                $analytic->parse($line);
            }
        }
    }

    /**
     * @param FormatInterface|FormatAbstract|null $format
     * @return mixed
     * @throws \App\Exceptions\ErrorClassDoesNotExist
     * @throws \App\Exceptions\ErrorClassDoesNotImplement
     */
    public function getData(FormatInterface $format = null)
    {
        if ($format === null) {
            $format = $this->initOne(FormatInterface::class, $this->config['format']);
        }

        $format->check($this->analytics);

        $convertedData = $format->convert($this->analytics);

        return $convertedData;
    }

    /**
     * @return \Generator
     */
    private function readFile(): \Generator
    {
        $file = new \SplFileObject($this->pathToFile);

        while (!$file->eof()) {
            yield $file->fgets();
        }

        $file = null;
    }
}