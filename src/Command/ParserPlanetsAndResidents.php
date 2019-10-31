<?php


namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\PlanetsAndResidents;
use App\Entity\ResidentsAndPlanets;

class ParserPlanetsAndResidents extends Command
{
    protected static $defaultName = 'app:parser-planets-and-residents';

    protected $Params;

    protected $Connection;

    protected $EmManager;

    protected $ResidentsURL = [];

    protected function configure()
    {
        // ...
    }

    /**
     * Request метод парсинга данных
     * @param string $url
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */

    public function Request(string $url): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $statusCode = $response->getStatusCode();

        if ($statusCode == 200 && !empty($response->getHeaders()['content-type'][0]) && $response->getHeaders()['content-type'][0] == 'application/json') {

            $content = $response->getContent();

            if (!empty($content = $response->toArray())) {

                return $content;

            } else {
                return [];
            }

        } else {
            return [];
        }
    }

    /**
     * Добавляет в список резидентов для парсинга
     * @param array $residents
     */

    protected function setResidentsURL(array $residents): void
    {
        if (!empty($residents)) {
            foreach ($residents as $key => $value) {
                if (!in_array($value, $this->ResidentsURL)) {
                    $this->ResidentsURL[] = $value;
                }
            }
        }
    }

    /**
     * Проверяет наличие планеты или жителя по url
     * @param $objectClass
     * @param string $url
     * @return bool
     */

    protected function CheckPlanetOrResident($objectClass, string $url)
    {
        $RetObj = $this->EmManager->getRepository($objectClass)->findBy(['url' => $url]);

        return (!empty($RetObj) ? $RetObj[0] : false);
    }

    /**
     * Присваивает свойства, классу-объекту для работы с Doctrine
     * @param $Object
     * @param array $Data
     * @return mixed
     * @throws \Exception
     */

    protected function setPlanetOrResident($Object, array $Data)
    {
        $Data['count_residents'] = (!empty($Data['residents']) ? count($Data['residents']) : 0);

        foreach ($Data as $key => $value) {

            $Method = 'set' . str_replace('_', '', mb_convert_case($key, MB_CASE_TITLE, "UTF-8"));

            if ($key == 'name' && $value == 'unknown') {
                $value = 'No name';
            }

            if (method_exists($Object, $Method) && $value !== 'unknown') {

                if (in_array($key, ['created', 'edited'])) {
                    $value = new \DateTime($value);
                }

                if (is_array($value)) {
                    $ValObj = $value;
                } elseif (is_string($value)) {

                    if (is_numeric(str_replace(',', '.', $value))) {
                        $ValObj = floatval($value);
                    } else {
                        $ValObj = $value;
                    }

                } elseif (is_int($value)) {
                    $ValObj = floatval($value);
                } else {
                    $ValObj = $value;
                }

                $Object->$Method($ValObj);
            }
        }

        return $Object;
    }

    /**
     * Парсит объекты по url
     * @param string $RequestUrl
     * @param $objectParse
     * @return int
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */

    protected function parseObjects(string $RequestUrl, $objectParse): int
    {
        $i = 0;

        $NameObject = get_class($objectParse);

        while ($RequestUrl) {

            echo $RequestUrl . "\r\n";

            $Request = $this->Request($RequestUrl);

            $Results = [];

            $RequestUrl = (!empty($Request['next'])) ? $Request['next'] : false;

            if (!empty($Request['results']) || !empty($Request['url'])) {

                if (!empty($Request['results'])) {
                    $Results = $Request['results'];
                } else {
                    $Results[] = $Request;
                }

                foreach ($Results as $key => $value) {

                    $InsObject = [];

                    if (($RetObj = $this->CheckPlanetOrResident($NameObject,
                        $value['url']))) {

                        if (($RetObj->getEdited()->format('Y-m-d H:i:s') !== (new \DateTime($value['edited']))->format('Y-m-d H:i:s'))) {
                            $InsObject = $RetObj;
                        }

                    } else {
                        $InsObject = new $NameObject;
                    }

                    if (!empty($InsObject) && empty($InsObject->getId()) || !empty($InsObject) && $RetObj) {
                        $this->setPlanetOrResident($InsObject, $value);

                        if (method_exists($InsObject,
                                'getResidents') && !empty(($ObjResidents = $InsObject->getResidents()))) {
                            $this->setResidentsURL($ObjResidents);
                        }

                        $this->EmManager->persist($InsObject);
                        $this->EmManager->flush();

                        $i++;
                    }

                }

            }

        }

        return $i;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        if (empty($this->Params['url'])) {
            echo 'Не задан url в файле конфигурации!';
            return;
        }

        $this->EmManager = $this->getApplication()->getKernel()->getContainer()->get('doctrine')->getManager();
        $this->Connection = $this->EmManager->getConnection();

        $RequestUrl = $this->Params['url'];

        $i = $this->parseObjects($RequestUrl, new PlanetsAndResidents());

        echo "\r\n" . 'Спарсено/обновлено объектов Planets: ' . $i . "\r\n";

        $i = 0;

        if (!empty($this->ResidentsURL)) {

            foreach ($this->ResidentsURL as $key => $value) {
                if (!empty($this->parseObjects($value, new ResidentsAndPlanets()))) {
                    $i++;
                }
            }
        }

        echo "\r\n" . 'Спарсено/обновлено объектов Residents: ' . $i . "\r\n";

    }

    public function __construct(string $name = null, array $Params = null)
    {
        $this->Params = (!empty($Params) ? $Params : []);

        parent::__construct($name);
    }
}