<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class HomeController extends AbstractController
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }
    
    /**
     * @Route("", name="app_home1")
     */
    public function home(AuthenticationUtils $authenticationUtils): Response { 
        return $this->render('theme/base/layout.html.twig');
    }

    /**
     * @Route("/{locale}", name="app_home")
     */
    public function homeWithLocale(AuthenticationUtils $authenticationUtils, $locale): Response
    {   
        if($locale == 'en'){
            return $this->render('theme/base/layout.html.twig');
        } else if($locale == 'du'){
            return $this->render('theme/child1/layout.html.twig');
        } else if($locale == 'ng'){
            return $this->render('theme/child2/layout.html.twig');
        }
        
    }
}
