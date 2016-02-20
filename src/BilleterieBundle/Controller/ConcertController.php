<?phpnamespace BilleterieBundle\Controller;use Symfony\Component\HttpFoundation\Request;//use BilleterieBundle\Entity\Concert;use Symfony\Bundle\FrameworkBundle\Controller\Controller;//use Symfony\Component\HttpFoundation\Request;//use Symfony\Component\HttpFoundation\Response;class ConcertController extends Controller{    /**     * @param $slug     * @return Response     */    public function viewConcertAction($slug)    {        $em = $this->getDoctrine()->getManager();        $concert = $em->getRepository('BilleterieBundle:Concert')->findOneBySlug($slug);        if ($concert === null) {            throw $this->createNotFoundException("L'annonce demandée n'existe plus.");        }        return $this->render('BilleterieBundle:Billeterie:viewConcert.html.twig', array(            'concert' => $concert,        ));    }    /**     * @param Request $request     * @return \Symfony\Component\HttpFoundation\Response     */    public function allConcertAction(Request $request)    {        $em = $this->getDoctrine()->getManager();        $limitPage = 10;        $numberPage = 1;        $result = $em->getRepository('BilleterieBundle:Concert')->getAllDesc();        $listConcert = $this->get('knp_paginator')->paginate(            $result,            $request->query->get('page', $numberPage),            $limitPage        );           return $this->render('BilleterieBundle:Billeterie:viewConcertAll.html.twig', array(            'concerts' => $listConcert,        ));    }    }