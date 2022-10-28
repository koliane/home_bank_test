<?php

namespace HomeBank\Application\UseCases;

use HomeBank\Data\Providers\Office\OfficesFromTxtProvider;
use HomeBank\Data\Providers\Office\OfficesToJsonProvider;
use HomeBank\Data\Providers\Office\OfficesToXmlProvider;
use HomeBank\Domain\Entities\Office\Service\OfficeService;

class OfficesFeedConverterCase implements UseCaseType
{
    private readonly string $pathToTxtFeed;
    private readonly string $pathToXmlOutput;
    private readonly string $pathToJsonOutput;

    public function __construct(string $pathToTxtFeed, string $pathToXmlOutput, string $pathToJsonOutput) {
        $this->pathToTxtFeed = $pathToTxtFeed;
        $this->pathToXmlOutput = $pathToXmlOutput;
        $this->pathToJsonOutput = $pathToJsonOutput;
    }

    public function use(): void
    {
        $provider = new OfficesFromTxtProvider($this->pathToTxtFeed);
        $officeService = new OfficeService();
        $offices = $officeService->getOffices($provider);

        $officesSaverProvider = new OfficesToXmlProvider($this->pathToXmlOutput);
        $officeService->saveOffices($offices, $officesSaverProvider);

        $officesSaverProvider = new OfficesToJsonProvider($this->pathToJsonOutput);
        $officeService->saveOffices($offices, $officesSaverProvider);
    }
}