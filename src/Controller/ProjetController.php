<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Entity\Techno;
use App\Form\ProjetType;
use App\Repository\ProjetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/projet")
 */
class ProjetController extends AbstractController
{
    /**
     * @Route("/", name="projet")
     */
    public function default(ProjetRepository $projetRepository)
    {
        $projets = $projetRepository->findAll();
        
        return $this->render('projet/index.html.twig',
        [
            'projets' => $projets
        ]);
    }

    /**
     * @Route("/add", name="projet_add")
     */
    public function add(Request $request, EntityManagerInterface $entityManager)
    {
        $projet = new Projet();

        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid()   ){

                      
            $entityManager->persist($projet);
            $entityManager->flush();            
            return $this->redirectToRoute('projet');
        }


        return $this->render('projet/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="projet_edit", requirements={"id"="\d+"})
     */
    public function edit( Projet $projet, Request $request, EntityManagerInterface $entityManager )
    {
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid()   ){
   
            
            $entityManager->flush();               
            return $this->redirectToRoute('projet');
        }
        
        return $this->render('projet/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="projet_delete", requirements={"id"="\d+"})
     */
    public function delete( Projet $projet, EntityManagerInterface $entityManager )
    {
        
        $entityManager->remove($projet);
        $entityManager->flush();
        return $this->redirectToRoute('projet');
    }
}
