<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    #[Route('/msg', name: 'msg')]
    public function msg(): Response
    {
        
        return new Response('hello world');
    }
   
    #[Route('/json', name: 'json')]
    public function formatJson(): Response
    {
        
        return new JsonResponse('json');
    }
    #[Route('/html', name: 'html')]
    public function html(): Response
    {
        
        return new Response('<h1> html</h1>');
    }

    #[Route('/p/{idt}', name: 'tttttttt')]
    public function param($idt): Response
    {
        //send request  to db select * from product where id=idt
        
        return new Response('bonjour'.$idt);
    }
    #[Route('/file/{n}', name: 'file')]
    public function filess($n): Response
    {
        $klass="3A13";
        
        return $this->render('test/3A13.html.twig',[
            'c'=>$klass,
            'name'=>$n
        ]);
    }

    #[Route('/list', name: 'list')]
    public function list(): Response
    {
        $authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300),
            );
        
        return $this->render('test/list.html.twig',[
            'a'=>$authors
        ]);
    }



    
}

