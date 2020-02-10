<?php

namespace App\Controller;

use App\Repository\TechnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TechnoController extends AbstractController
{
    /**
     * @Route("/techno", name="techno")
     */
    public function index(TechnoRepository $technoRepository)
    {
        $technos = $technoRepository->findAll();
        
        return $this->render('techno/index.html.twig', [
            'technos' => $technos,
        ]);
    }

    /**
     * @Route("/techno/add", name="techno_add")
     */
    public function add(TechnoRepository $technoRepository)
    {
        $technos = $technoRepository->findAll();
        
        return $this->render('techno/index.html.twig', [
            'technos' => $technos,
        ]);
    }


    /**
     * @Route("/techno/edit/{id}", name="techno_edit")
     */
    public function edit(TechnoRepository $technoRepository)
    {
        $technos = $technoRepository->findAll();
        
        return $this->render('techno/index.html.twig', [
            'technos' => $technos,
        ]);
    }

    /**
     * @Route("/techno/delete/{id}", name="techno_delete")
     */
    public function delete(TechnoRepository $technoRepository)
    {
        $technos = $technoRepository->findAll();
        
        return $this->render('techno/index.html.twig', [
            'technos' => $technos,
        ]);
    }
}
