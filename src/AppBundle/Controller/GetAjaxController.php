<?php

// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\People;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM;

class GetAjaxController extends Controller
{
     
	/**
    * @Route("/ajax", name="ajax")
    */
     
       public function AutoCompletePaysAction(Request $request)
{
			$term = $request->get('term',null);
			 
			return $term;
		}
     
}	 
 


 
       




 

