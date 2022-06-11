<?php
use App\Entity\BusinessDepartment;
use App\Entity\Contact;
use App\Form\ContactForm;
use App\Entity\Admin\Reservation;
use App\Form\Admin\ReservationType;
use App\Repository\HotelRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\DoctrineOrmExtension;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class reservationTest extends KernelTestCase
{
     public function testBuildForm()
    {
        $kernel = self::bootKernel();

        /**
         * @var $container ContainerInterface
         */
        $container = $kernel->getContainer();
        $data =  array('id' => '18',
        'userid' => '10',
        'hotelid' => '6',
        'roomid' => '11',
        'name' => 'hajjajihajer',
        'surname' => 'hajjajihajer20',
        'email' => 'hajjajihajer24@gmail.com',
        'phone' => NULL,
        'checkin' => '2021-04-21 00:00:00',
        'checkout' => '2021-08-05 00:00:00',
        'days' => '106',
        'total' => '4240',
        'ip' => '::1',
        'message' => 'goood',
        'note' => NULL,
        'status' => 'New',
        'created_at' => '2021-03-12 11:29:09',
        'updated_at' => NULL)
        ;

            $resa = new Reservation();
            $formFactory = $container->get("form.factory");
            $form = $formFactory->create(ReservationType::class, $resa);

        $contactToCompare = new Reservation();
       

        $expected = new Reservation();
        // ...populate $object properties with the data stored in $formData

        // submit the data to the form directly
        $form->submit($data);

        // This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());

        // check that $model was modified as expected when the form was submitted
        $this->assertEquals($expected, $resa);
    }

    
}