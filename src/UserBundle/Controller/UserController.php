<?php

namespace UserBundle\Controller;

use BilleterieBundle\Entity\Concert;
use BilleterieBundle\Form\ConcertType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $limitPage = 10;
        $numberPage = 1;

        $result = $em->getRepository('BilleterieBundle:Concert')->getAllDesc();

        $listConcert = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );

        return $this->render('UserBundle:Concert:list.html.twig', array(
            'concerts' => $listConcert,
        ));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function addConcertAction(Request $request)
    {
        $concert = new Concert();
        $form = $this->createForm(ConcertType::class, $concert);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            var_dump($concert);

            $em->persist($concert);
            $em->flush();
            return $this->redirect($this->generateUrl('user_admin_view_concert', array('slug' => $concert->getSlug())));
        }


        return $this->render('UserBundle:Concert:form.html.twig', array(
            'form' => $form->createView(),
            'concert' => $concert
        ));
    }


    /**
     * @param $slug
     * @return Response
     */
    public function viewConcertAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $concert = $em->getRepository('BilleterieBundle:Concert')->findOneBySlug($slug);

        if ($concert === null) {
            throw $this->createNotFoundException("L'annonce demandée n'existe plus.");
        }
        return $this->render('UserBundle:Concert:view.html.twig', array(
            'concert' => $concert,
        ));
    }


    /**
     * @param $slug
     * @param Request $request
     * @return Response
     */
    public function editConcertAction($slug, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $modified = false;
        $concert = $em->getRepository('BilleterieBundle:Concert')->findOneBySlug($slug);

        if ($concert === null) {
            throw $this->createNotFoundException("L'annonce demandée n'existe plus.");
        }

        $form = $this->createForm(ConcertType::class, $concert);

        if ($form->handleRequest($request)->isValid()) {
            $em->flush();
            $modified = true;

        }


        return $this->render('UserBundle:Concert:form.html.twig', array(
            'form' => $form->createView(),
            'concert' => $concert,
            'modified' => $modified,
        ));
    }


    public function deleteConcertAction(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $id = $request->get('id');
            $concert = $em->getRepository('BilleterieBundle:Concert')->find($id);

            if (null === $concert) {
                throw new NotFoundHttpException("L'annonce d'id " . $concert . " n'existe pas.");
            }
            $message = 'L\'annonce "' . $concert->getName() . ' (ID: <b>' . $concert->getId() . '</b>)" a été supprimée.';

            $em->remove($concert);
            $em->flush();
            return new Response(json_encode(array('message' => 'Success', 'result' => $message)));

        }
        return new response (json_encode(array('message' => 'Error!')));
    }


}
