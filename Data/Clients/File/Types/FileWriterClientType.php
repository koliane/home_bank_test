<?php
namespace HomeBank\Data\Clients\File\Types;

interface FileWriterClientType
{
    public function write(string $data, string $destinationPath): void;
}