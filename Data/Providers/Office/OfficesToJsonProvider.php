<?php

namespace HomeBank\Data\Providers\Office;

use HomeBank\Data\Clients\File\Exception\FileClientException;
use HomeBank\Data\Clients\File\FileClient;
use HomeBank\Data\Clients\File\Types\FileWriterClientType;
use HomeBank\Data\Mappers\Json\Office\OfficesJsonMapper;
use HomeBank\Data\Mappers\Xml\Office\OfficesXmlMapper;
use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;
use HomeBank\Domain\Entities\Office\Types\OfficesSaverProviderType;

class OfficesToJsonProvider extends BaseSaverProvider
{
    /**
     * @throws FileClientException
     */
    public function saveOffices(OfficeCollection $offices): void
    {
        $mapper = new OfficesJsonMapper();
        $data = $mapper->toJson($offices);

        $this->client->write($data, $this->pathToSave);
    }
}