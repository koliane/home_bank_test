<?php

namespace HomeBank\Data\Clients\File;

use HomeBank\Data\Clients\File\Exception\FileClientException;
use HomeBank\Data\Clients\File\Types\FileReaderClientType;
use HomeBank\Data\Clients\File\Types\FileWriterClientType;

class FileClient implements FileReaderClientType, FileWriterClientType
{
    /**
     * @throws FileClientException
     */
    public function read(string $pathToFile): string
    {
        try{
            $result = file_get_contents($pathToFile);
        } catch (\Exception $e) {
            throw new FileClientException("Ошибка прочтения файла по пути {$pathToFile}", previous: $e);
        }
        if(!$result)
            throw new FileClientException("Ошибка прочтения файла по пути {$pathToFile}");

        return $result;
    }

    /**
     * @throws FileClientException
     */
    public function write(string $data, string $destinationPath): void
    {
        try{
            $status = file_put_contents($destinationPath, $data);
        } catch (\Exception $e) {
            throw new FileClientException("Не удалось записать данные в файл {$destinationPath}", previous: $e);
        }
        if(!$status)
            throw new FileClientException("Не удалось записать данные в файл {$destinationPath}");
    }
}