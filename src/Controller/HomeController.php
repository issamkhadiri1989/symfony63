<?php

namespace App\Controller;

use App\Document\Book;
use App\Exception\UserNotSupportedException;
use App\Form\Type\Document\BookType;
use App\Message\InterviewFeedback;
use App\Service\Locator\UserLocator;
use Doctrine\ODM\MongoDB\DocumentManager;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class HomeController extends AbstractController
{
    #[Route(path: "/", name: "app_home")]
    public function home(MessageBusInterface $bus): Response
    {
        $bus->dispatch(new InterviewFeedback('This is awesome !'));

        return $this->render('home/home.html.twig');
    }


    /**
     * @param UserInterface $user
     * @param UserLocator   $userLocator
     * @param Request       $request
     *
     * @return Response
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws UserNotSupportedException
     */
    #[Route('/profile', name: 'app_index')]
    public function index(#[CurrentUser] UserInterface $user, UserLocator $userLocator, Request $request): Response
    {
        $userType = $userLocator->findCorrespondingType($user);
        $form = $userType->getTypeBuilder($user)->buildForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // this must print the submitted data
            dd($form->getData());
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
        ]);
    }

    #[Route(path: "/example", name: "app_example")]
    public function example(DocumentManager $manager): Response
    {
        $book = $manager->find(Book::class, '6482307ac2b46d0008979b36');
        $form = $this->createForm(BookType::class, $book);
//        dump($this->getParameter('app.issam'));
//        dump($book);

        return $this->render('home/example.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
