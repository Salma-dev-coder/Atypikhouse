<?php
use App\Entity\BusinessDepartment;
use App\Entity\Contact;
use App\Form\ContactForm;
use App\Entity\Hotel;
use App\Form\Hotel1Type;
use App\Repository\HotelRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\DoctrineOrmExtension;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class annonceTest extends KernelTestCase
{
     public function testBuildForm()
    {
        $kernel = self::bootKernel();

        /**
         * @var $container ContainerInterface
         */
        $container = $kernel->getContainer();
        $data =  array('id' => '1',
        'category_id' => '15',
        'title' => 'Monchâteau Etoilé, hébergement insolite',
        'keywords' => 'Monchâteau Etoilé, hébergement insolite',
        'description' => 'Monchâteau Etoilé, hébergement insolite',
        'image' => 'd0de8523f1efa80113e3c22043bac62e.jpg',
        'star' => '5',
        'address' => '2 impasse Monchâteau38620, MERLAS',
        'city' => 'Paris',
        'phone' => NULL,
        'email' => NULL,
        'fax' => NULL,
        'country' => 'Frans',
        'location' => NULL,
        'status' => 'True',
        'created_at' => NULL,
        'updated_at' => NULL,
        'detail' => 'tst',
        'userid' => '2');

            $hotel = new Hotel();
            $formFactory = $container->get("form.factory");
            $form = $formFactory->create(Hotel1Type::class, $hotel);

        $contactToCompare = new Hotel();
       

        $expected = new Hotel();
        // ...populate $object properties with the data stored in $formData

        // submit the data to the form directly
        $form->submit($data);

        // This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());

        // check that $model was modified as expected when the form was submitted
        $this->assertEquals($expected, $hotel);
    }

    
}