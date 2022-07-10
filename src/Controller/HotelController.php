<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Form\Hotel1Type;
use App\Repository\HotelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/hotel")
 */
class HotelController extends AbstractController
{
    /**
     * @Route("/", name="user_hotel_index", methods={"GET"})
     */
    public function index(HotelRepository $hotelRepository): Response
    {
        $user = $this->getUser(); // Get login User data
        return $this->render('hotel/index.html.twig', [
            'hotels' => $hotelRepository->findBy(['userid'=>$user->getId()]),
        ]);
    }

    /**
     * @Route("/new", name="user_hotel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hotel = new Hotel();
        $form = $this->createForm(Hotel1Type::class, $hotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            //************** file upload ***>>>>>>>>>>>>
            /** @var file $file */
            $file = $form['image']->getData();
            if ($file) {
                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
                // Move the file to the directory where brochures are stored
                try {
                    $file->move(
                        $this->getParameter('images_directory'), // in Servis.yaml defined folder for upload images
                        $fileName
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $hotel->setImage($fileName); // Related upload file name with Hotel table image field
            }
            //<<<<<<<<<<<<<<<<<******** file upload ***********>

            $user = $this->getUser(); // Get login User data
            $hotel->setUserid($user->getId());
            $hotel->setStatus("True");
//            $hotel->setStatus("New");
            $entityManager->persist($hotel);
            $entityManager->flush();

            return $this->redirectToRoute('user_hotel_index');
        }

        return $this->render('hotel/new.html.twig', [
            'hotel' => $hotel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_hotel_show", methods={"GET"})
     */
    public function show(Hotel $hotel): Response
    {
        return $this->render('hotel/show.html.twig', [
            'hotel' => $hotel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_hotel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Hotel $hotel): Response
    {
        $form = $this->createForm(Hotel1Type::class, $hotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var file $file */
            $file = $form['image']->getData();
            if ($file) {
                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
                // Move the file to the directory where brochures are stored
                try {
                    $file->move(
                        $this->getParameter('images_directory'), // Servis.yaml de tanımladığımız resim yolu
                        $fileName
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                $hotel->setImage($fileName);
            }


            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_hotel_index');
        }

        return $this->render('hotel/edit.html.twig', [
            'hotel' => $hotel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

    /**
     * @Route("/{id}", name="user_hotel_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Hotel $hotel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hotel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hotel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_hotel_index');
    }
}
