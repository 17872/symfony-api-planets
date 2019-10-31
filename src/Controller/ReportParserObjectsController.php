<?php

namespace App\Controller;

use App\Entity\PlanetsAndResidents;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReportParserObjectsController extends Controller
{
    protected $Repository;

    public function only3()
    {
        $Objects = $this->Repository->findBy(['count_residents'=> 3], ['name'=>'ASC']);

        return $this->render('report_parser.html.twig', [
            'Objects' => ( !empty($Objects) ? $Objects : [] ),
            'Title' => 'Планеты, на которых живёт ровно 3 жителя.'
        ]);
    }

    /**
     * Отсортировать по убыванию кол-ва жителей.
     * @return Response
     */

    public function index()
    {
        $Objects = $this->Repository->findBy([], ['count_residents'=>'DESC']);

        return $this->render('report_parser.html.twig', [
            'Objects' => ( !empty($Objects) ? $Objects : [] ),
            'Title' => 'Отсортировать по убыванию кол-ва жителей.'
        ]);
    }

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->Repository = $entityManager->getRepository(PlanetsAndResidents::class);
    }
}