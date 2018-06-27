<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vice controller.
 *
 * @Route("vice")
 */
class ViceController extends Controller
{
    /**
     * Lists all vice entities.
     *
     * @Route("/", name="vice_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vices = $em->getRepository('AppBundle:Vice')->findAll();

        return $this->render('vice/index.html.twig', array(
            'vices' => $vices,
        ));
    }

    /**
     * Creates a new vice entity.
     *
     * @Route("/new", name="vice_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vice = new Vice();
        $form = $this->createForm('AppBundle\Form\ViceType', $vice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vice);
            $em->flush();

            return $this->redirectToRoute('vice_show', array('id' => $vice->getId()));
        }

        return $this->render('vice/new.html.twig', array(
            'vice' => $vice,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vice entity.
     *
     * @Route("/{id}", name="vice_show")
     * @Method("GET")
     */
    public function showAction(Vice $vice)
    {
        $deleteForm = $this->createDeleteForm($vice);

        return $this->render('vice/show.html.twig', array(
            'vice' => $vice,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vice entity.
     *
     * @Route("/{id}/edit", name="vice_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vice $vice)
    {
        $deleteForm = $this->createDeleteForm($vice);
        $editForm = $this->createForm('AppBundle\Form\ViceType', $vice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vice_edit', array('id' => $vice->getId()));
        }

        return $this->render('vice/edit.html.twig', array(
            'vice' => $vice,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vice entity.
     *
     * @Route("/{id}", name="vice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vice $vice)
    {
        $form = $this->createDeleteForm($vice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vice);
            $em->flush();
        }

        return $this->redirectToRoute('vice_index');
    }

    /**
     * Creates a form to delete a vice entity.
     *
     * @param Vice $vice The vice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vice $vice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vice_delete', array('id' => $vice->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
