<?php

namespace HomeBank\Data\Clients\File\Types;

interface FileReaderClientType
{
    public function read(string $pathToFile): string;
}