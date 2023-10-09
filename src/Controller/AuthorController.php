<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
    #[Route('/list')]
    public function fecthAuthor(AuthorRepository $repo)
    {
        $Authors = $repo->findAll();
        return $this->render('author/list.html.twig',[
            'result'=>$Authors
        ]);
    }
    #[Route('/addAuth',name:'addauth')]
    public function addAuthor(ManagerRegistry $mr){
$author=new Author();
$author->setUsername('medd 2');
$author->setEmail('medd2@esprit.tn');
$em=$mr->getManager();
$em->persist($author);
$em->flush();
return $this->redirectToRoute('list');
    }
}
