<?php

namespace HomeBank\Data\Providers\Office;

use HomeBank\Data\Clients\File\Exception\FileClientException;
use HomeBank\Data\Mappers\Xml\Office\OfficesXmlMapper;
use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;

class OfficesToXmlProvider extends BaseSaverProvider
{
    /**
     * @throws FileClientException
     */
    public function saveOffices(OfficeCollection $offices): void
    {
        $mapper = new OfficesXmlMapper();
        $data = $mapper->toXml($offices);

        $this->client->write($data, $this->pathToSave);
    }
}