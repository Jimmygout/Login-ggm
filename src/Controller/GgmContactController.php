<?php

namespace App\Controller;

use App\Entity\GgmContact;
use App\Form\GgmContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contact")
 */
class GgmContactController extends AbstractController
{
    /**
     * @Route("/", name="ggm_contact_index", methods={"GET"})
     */
    public function index(): Response
    {
        $ggmContacts = $this->getDoctrine()
            ->getRepository(GgmContact::class)
            ->findAll();

        return $this->render('ggm_contact/index.html.twig', [
            'ggm_contacts' => $ggmContacts,
        ]);
    }

    /**
     * @Route("/new", name="ggm_contact_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ggmContact = new GgmContact();
        $form = $this->createForm(GgmContactType::class, $ggmContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ggmContact);
            $entityManager->flush();

            return $this->redirectToRoute('ggm_contact_index');
        }

        return $this->render('ggm_contact/new.html.twig', [
            'ggm_contact' => $ggmContact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{pkGgmContact}", name="ggm_contact_show", methods={"GET"})
     * @param GgmContact $ggmContact
     * @return Response
     */
    public function show(GgmContact $ggmContact): Response
    {
        return $this->render('ggm_contact/show.html.twig', [
            'ggm_contact' => $ggmContact,
        ]);
    }

    /**
     * @Route("/{pkGgmContact}/edit", name="ggm_contact_edit", methods={"GET","POST"})
     * @param Request $request
     * @param GgmContact $ggmContact
     * @return Response
     */
    public function edit(Request $request, GgmContact $ggmContact): Response
    {
        $form = $this->createForm(GgmContactType::class, $ggmContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ggm_contact_index');
        }

        return $this->render('ggm_contact/edit.html.twig', [
            'ggm_contact' => $ggmContact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{pkGgmContact}", name="ggm_contact_delete", methods={"DELETE"})
     */
    public function delete(Request $request, GgmContact $ggmContact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ggmContact->getPkGgmContact(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ggmContact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ggm_contact_index');
    }
}
