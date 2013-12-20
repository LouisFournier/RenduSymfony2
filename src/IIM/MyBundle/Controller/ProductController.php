<?php

namespace IIM\MyBundle\Controller;

use IIM\MyBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;



class ProductController extends Controller
{

    /**
     * Lists all Product entities.
     *
     * @Route("admin/", name="product")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $entities= $this->get('product.manager')->findAll();


        return array(
            'entities' => $entities,
        );
    }


    /**
     * Creates a new Product entity.
     *
     * @Route("/admin/create", name="product_create")
     *
     * @Template()
     */
    public function createAction(Request $request)
    {


        $form = $this->createForm(new ProductType(), null, array(
            'action' => $this->generateUrl('product_create'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Create'));


        if ('POST' == $request->getMethod()) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $product = $form->getData();
                $this->get('product.manager')->update($product);

                return $this->redirect($this->generateUrl('product_show', array('id' => $product->getId())));
            }
        }

        return array(
            'form'   => $form->createView()
        );

    }





    /**
     * Finds and displays a Product entity.
     *
     * @Route("admin/show/{id}", name="product_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {

        $entity = $this->get('product.manager')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }





    /**
     * Displays a form to edit an existing Product entity.
     *
     * @Route("admin/edit/{id}/", name="product_edit")
     *
     * @Template()
     */
    public function editAction(Request $request, $id)
    {
        $entity = $this->get('product.manager')->find($id);

        $form = $this->createForm(new ProductType(), $entity, array(
            'action' => $this->generateUrl('product_edit',array('id'=>$id)),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Edit'));


        if ('POST' == $request->getMethod()) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $product = $form->getData();
                $this->get('product.manager')->update($product);

                return $this->redirect($this->generateUrl('product_show', array('id' => $product->getId())));
            }
        }

        return array(
            'product' => $entity,
            'edit_form' => $form->createView(),
            'delete_form' => $this->createDeleteForm($id)->createView(),
        );


    }






    /**
     * Deletes a Product entity.
     *
     * @Route("admin/{id}/delete", name="product_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity = $this->get('product.manager')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }

            $entity = $this->get('product.manager')->delete($entity);
        }

        return $this->redirect($this->generateUrl('product'));
    }





    /**
     * Creates a form to delete a Product entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('product_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }






}













