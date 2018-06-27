<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Attraction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Attraction controller.
 *
 * @Route("attraction")
 */
class AttractionController extends Controller
{
    /**
     * Lists all attraction entities.
     *
     * @Route("/", name="attraction_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $attractions = $em->getRepository('AppBundle:Attraction')->findAll();

        return $this->render('attraction/index.html.twig', array(
            'attractions' => $attractions,
        ));
    }

    /**
     * Creates a new attraction entity.
     *
     * @Route("/new", name="attraction_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $attraction = new Attraction();
        $form = $this->createForm('AppBundle\Form\AttractionType', $attraction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($attraction);
            $em->flush();

            return $this->redirectToRoute('attraction_show', array('id' => $attraction->getId()));
        }

        return $this->render('attraction/new.html.twig', array(
            'attraction' => $attraction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a attraction entity.
     *
     * @Route("/{id}", name="attraction_show")
     * @Method("GET")
     */
    public function showAction(Attraction $attraction)
    {
        $deleteForm = $this->createDeleteForm($attraction);

        return $this->render('attraction/show.html.twig', array(
            'attraction' => $attraction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing attraction entity.
     *
     * @Route("/{id}/edit", name="attraction_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Attraction $attraction)
    {
        $deleteForm = $this->createDeleteForm($attraction);
        $editForm = $this->createForm('AppBundle\Form\AttractionType', $attraction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('attraction_edit', array('id' => $attraction->getId()));
        }

        return $this->render('attraction/edit.html.twig', array(
            'attraction' => $attraction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a attraction entity.
     *
     * @Route("/{id}", name="attraction_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Attraction $attraction)
    {
        $form = $this->createDeleteForm($attraction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($attraction);
            $em->flush();
        }

        return $this->redirectToRoute('attraction_index');
    }

    /**
     * Creates a form to delete a attraction entity.
     *
     * @param Attraction $attraction The attraction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Attraction $attraction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('attraction_delete', array('id' => $attraction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
