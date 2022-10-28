<?php

namespace HomeBank\Data\Providers\Office;

use HomeBank\Data\Clients\File\FileClient;
use HomeBank\Data\Clients\File\Types\FileWriterClientType;
use HomeBank\Domain\Entities\Office\Types\OfficesSaverProviderType;

abstract class BaseSaverProvider  implements OfficesSaverProviderType
{
    protected readonly string $pathToSave;
    protected readonly FileWriterClientType $client;

    public function __construct(string $pathToSave, ?FileWriterClientType $client = null) {
        $this->pathToSave = $pathToSave;

        if(is_null($client))
            $client = new FileClient();
        $this->client = $client;
    }
}