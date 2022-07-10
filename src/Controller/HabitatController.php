<?php

namespace App\Controller;

use App\Entity\Admin\Messages;
use App\Entity\Hotel;
use App\Entity\Setting;
use App\Form\Admin\MessagesType;
use App\Repository\Admin\CommentRepository;
use App\Repository\Admin\RoomRepository;
use App\Repository\HotelRepository;
use App\Repository\ImageRepository;
use App\Repository\SettingRepository;
use PhpParser\Node\Expr\BinaryOp\NotEqual;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Bridge\Google\Smtp\GmailTransport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;



class HabitatController extends AbstractController
{
    /**
     * @Route("/habitat", name="habitat")
     */
    public function index(SettingRepository $settingRepository,HotelRepository $hotelRepository): Response
    {
        $setting=$settingRepository->findAll();
        $slider=$hotelRepository->findBy(['status'=>'True'],['title'=>'ASC'] ,3);
        $hotels=$hotelRepository->findBy(['status'=>'True'],['title'=>'DESC'] ,10);
        $newhotels=$hotelRepository->findBy(['status'=>'True'],['title'=>'DESC'] ,10);
        // array findBy(array $criteria, array $orderBy = null, int|null $limit = null, int|null $offset = null)
        //dump($slider);
        //die();

        return $this->render('habitat/index.html.twig', [
            'controller_name' => 'HomeController',
            'setting'=>$setting,
            'slider'=>$slider,
            'hotels'=>$hotels,
            'newhotels'=>$newhotels,
        ]);
    }
    /**
     * @Route("/location", name="location")
     */
    public function index1(SettingRepository $settingRepository,HotelRepository $hotelRepository): Response
    {
        $setting=$settingRepository->findAll();
        $slider=$hotelRepository->findBy(['status'=>'True'],['title'=>'ASC'] ,3);
        $hotels=$hotelRepository->findBy(['status'=>'True'],['title'=>'DESC'] ,6);
        $newhotels=$hotelRepository->findBy(['status'=>'True'],['title'=>'DESC'] ,10);
        // array findBy(array $criteria, array $orderBy = null, int|null $limit = null, int|null $offset = null)
        //dump($slider);
        //die();

        return $this->render('home/location.html.twig', [
            'controller_name' => 'HomeController',
            'setting'=>$setting,
            'slider'=>$slider,
            'hotels'=>$hotels,
            'newhotels'=>$newhotels,
        ]);
    }
    /**
     * @Route("/activite", name="activite")
     */
    public function activite(SettingRepository $settingRepository,HotelRepository $hotelRepository): Response
    {
        $setting=$settingRepository->findAll();
        $slider=$hotelRepository->findBy(['status'=>'True'],['title'=>'ASC'] ,3);
        $hotels=$hotelRepository->findBy(['status'=>'True'],['title'=>'DESC'] ,6);
        $newhotels=$hotelRepository->findBy(['status'=>'True'],['title'=>'DESC'] ,10);
        // array findBy(array $criteria, array $orderBy = null, int|null $limit = null, int|null $offset = null)
        //dump($slider);
        //die();

        return $this->render('home/Activites.html.twig', [
            'controller_name' => 'HomeController',
            
            'slider'=>$slider,
            'hotels'=>$hotels,
            'newhotels'=>$newhotels,
        ]);
    }
}
