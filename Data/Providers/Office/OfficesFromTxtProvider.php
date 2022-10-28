<?php

namespace HomeBank\Data\Providers\Office;

use HomeBank\Data\Clients\File\FileClient;
use HomeBank\Data\Clients\File\Types\FileReaderClientType;
use HomeBank\Data\Mappers\Txt\Office\OfficesTxtMapper;
use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;
use HomeBank\Domain\Entities\Office\Types\OfficesListProviderType;

class OfficesFromTxtProvider implements OfficesListProviderType
{
    private readonly string $pathToFeed;
    private readonly FileReaderClientType $client;

    public function __construct(string $pathToFeed, ?FileReaderClientType $client = null) {
        $this->pathToFeed = $pathToFeed;

        if(is_null($client))
            $client = new FileClient();
        $this->client = $client;
    }

    /**
     * @throws \Exception
     */
    public function provideOffices(): OfficeCollection
    {
        $feed = $this->client->read($this->pathToFeed);

        return (new OfficesTxtMapper())->fromTxt($feed);
    }
}