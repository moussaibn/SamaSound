<?php

namespace Sama\SoundBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sama\SoundBundle\Entity\Musique;
use Sama\SoundBundle\Form\MusiqueType;

/**
 * Musique controller.
 *
 * @Route("/musique")
 */
class MusiqueController extends Controller
{

    /**
     * Lists all Musique entities.
     *
     * @Route("/", name="musique")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SamaSoundBundle:Musique')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Musique entity.
     *
     * @Route("/", name="musique_create")
     * @Method("POST")
     * @Template("SamaSoundBundle:Musique:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Musique();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('musique_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Musique entity.
     *
     * @param Musique $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Musique $entity)
    {
        $form = $this->createForm(new MusiqueType(), $entity, array(
            'action' => $this->generateUrl('musique_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Musique entity.
     *
     * @Route("/new", name="musique_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Musique();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Musique entity.
     *
     * @Route("/{id}", name="musique_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SamaSoundBundle:Musique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Musique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Musique entity.
     *
     * @Route("/{id}/edit", name="musique_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SamaSoundBundle:Musique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Musique entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Musique entity.
    *
    * @param Musique $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Musique $entity)
    {
        $form = $this->createForm(new MusiqueType(), $entity, array(
            'action' => $this->generateUrl('musique_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Musique entity.
     *
     * @Route("/{id}", name="musique_update")
     * @Method("PUT")
     * @Template("SamaSoundBundle:Musique:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SamaSoundBundle:Musique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Musique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('musique_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Musique entity.
     *
     * @Route("/{id}", name="musique_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SamaSoundBundle:Musique')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Musique entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('musique'));
    }

    /**
     * Creates a form to delete a Musique entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('musique_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
