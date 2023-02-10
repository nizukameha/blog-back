<?php

namespace App\Controller;

use App\Entities\Comment;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

#[Route("/api/comment")]
class CommentController extends AbstractController {

    private CommentRepository $repo;
    
    /**
     * @param CommentRepository $repo
     */
    public function __construct(CommentRepository $repo) {
    	$this->repo = $repo;
    }

    #[Route(methods: 'GET')]
    public function all() {
        $comments = $this->repo->findAll();
        return $this->json($comments);
    }
    
    #[Route("/{id}", methods: 'GET')]
    public function one(int $id) {
        $comment = $this->repo->findById($id);

        if ($comment) {
            return $this->json($comment);
        }
        throw new NotFoundHttpException();
    }

    #[Route(methods: 'POST')]
    public function add(Request $request, SerializerInterface $serializer) {
        
        $comment = $serializer->deserialize($request->getContent(), Comment::class, 'json');
        $this->repo->persist($comment);

        return $this->json($comment, Response::HTTP_CREATED);
    }

    #[Route('/{id}', methods: 'PUT')]
    public function put(int $id, Request $request, SerializerInterface $serializer) {   
        $comment = $this->repo->findById($id);
        if(!$comment){
            throw new NotFoundHttpException();
        }

        $commentToUpdate = $serializer->deserialize($request->getContent(), Comment::class, 'json');
        $commentToUpdate->setId($id);
        $this->repo->update($commentToUpdate);

        return $this->json($commentToUpdate);
    }

    #[Route('/{id}', methods: 'DELETE')]
    public function remove(int $id) {
        $comment = $this->repo->findById($id);
        if(!$comment){
            throw new NotFoundHttpException();
        }

        $this->repo->delete($comment);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}