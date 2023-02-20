<?php

namespace App\Controller;

use App\Entities\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Cache\Adapter\AbstractAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Exception\ValidationFailedException;

#[Route("/api/article")]
class ArticleController extends AbstractController {

    private ArticleRepository $repo;

    /**
     * @param ArticleRepository $repo
     */
    public function __construct(ArticleRepository $repo) {
    	$this->repo = $repo;
    }

    #[Route(methods: 'GET')]
    public function all() {
        $articles = $this->repo->findAll();

        return $this->json($articles);
    }

    #[Route("/{id}", methods: 'GET')]
    public function one(int $id) {
        $article = $this->repo->findById($id);
        $this->repo->addView($article);
        if ($article) {
            return $this->json($article);
        }
        throw new NotFoundHttpException();
    }

    #[Route(methods: 'POST')]
    public function add(Request $request, SerializerInterface $serializer) {

        try {
            $article = $serializer->deserialize($request->getContent(), Article::class, 'json');
            
            $article = $serializer->deserialize($request->getContent(), Article::class, 'json');
            $this->repo->persist($article);

            return $this->json($article, Response::HTTP_CREATED);

        } catch (ValidationFailedException $e) {
            return $this->json($e->getViolations(), Response::HTTP_BAD_REQUEST);
        } catch (NotEncodableValueException $e) {
            return $this->json('Invalid json', Response::HTTP_BAD_REQUEST);
        }

    }

    #[Route('/{id}', methods: 'PUT')]
    public function put(int $id, Request $request, SerializerInterface $serializer) {   
        $article = $this->repo->findById($id);
        if(!$article){
            throw new NotFoundHttpException();
        }

        try {
            $articleToUpdate = $serializer->deserialize($request->getContent(), Article::class, 'json');
            $articleToUpdate->setId($id);
            $this->repo->update($articleToUpdate);
            
            return $this->json($articleToUpdate);

        } catch (ValidationFailedException $e) {
            return $this->json($e->getViolations(), Response::HTTP_BAD_REQUEST);
        } catch (NotEncodableValueException $e) {
            return $this->json('Invalid json', Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/{id}', methods: 'DELETE')]
    public function remove(int $id) {
        $article = $this->repo->findById($id);
        if(!$article){
            throw new NotFoundHttpException();
        }

        $this->repo->delete($article);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    #[Route("/find/{title}", methods: 'GET')]
    public function title(string $title) {
        $article = $this->repo->findByTitle($title);

        if ($article) {
            return $this->json($article);
        }
        throw new NotFoundHttpException();
    }    
}