<?php

namespace App\Controller;

use App\Entity\Example;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerController extends AbstractController
{
    #[Route('/serializer', name: 'app_serializer')]
    public function index(#[MapRequestPayload] Example $example, #[MapQueryString] Example $anotherExample): Response
    {
        $data  = [
            'title' => 'ipsum lorem dolore',
            'nbPages' => 12,
        ];

        dump($example);
        dump($anotherExample);

        die;
        return $this->render('serializer/index.html.twig', [
            'controller_name' => 'SerializerController',
        ]);
    }
}
