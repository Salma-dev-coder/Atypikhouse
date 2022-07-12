<?php
use App\Entity\Admin\Reservation;
use App\Form\Admin\ReservationType;
use Symfony\Component\Form\Test\TypeTestCase;

class reservationTest extends TypeTestCase
{
   
    public function testSubmitValidData()
    {
        $formData = [
            'id' => '18',
            'userid' => '10',
            'hotelid' => '6',
            'roomid' => '11',
            'name' => 'hajjajihajer',
            'surname' => 'hajjajihajer20',
            'email' => 'hajjajihajer24@gmail.com',
            'phone' => NULL,
            'days' => '106',
            'total' => '4240',
            'message' => 'goood',
            'note' => NULL,
            'status' => 'New',
            'updated_at' => NULL,
        ];

        $model = new Reservation();
        // $model will retrieve data from the form submission; pass it as the second argument
        $form = $this->factory->create(ReservationType::class, $model);

        $expected = (new Reservation())
            ->setUserid($formData['userid'])
            ->setHotelid($formData['hotelid'])
            ->setRoomId($formData['roomid'])
            ->setName($formData['name'])
            ->setSurname($formData['surname'])
            ->setEmail($formData['email'])
            ->setPhone($formData['phone'])
            ->setDays($formData['days'])
            ->setTotal($formData['total'])
            ->setMessage($formData['message'])
            ->setNote($formData['note'])
            ->setStatus($formData['status']);
        // ...populate $expected properties with the data stored in $formData

        // submit the data to the form directly
        $form->submit($formData);

        // This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());

        // check that $model was modified as expected when the form was submitted
        $this->assertEquals($expected, $model);
    }

}
