<?php
use App\Entity\Hotel;
use App\Form\HotelType;
use App\Repository\HotelRepository;
use Symfony\Component\Form\Test\TypeTestCase;

class annonceTest extends TypeTestCase
{
    public function testInstanceHotel()
    {
        $formData =  ['id' => '1',
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
        'userid' => '2'];

        $expected = (new Hotel())
        ->setUserid($formData['userid'])
        ->setTitle($formData['title'])
        ->setKeywords($formData['keywords'])
        ->setDescription($formData['description'])
        ->setStar($formData['star'])
        ->setAddress($formData['address'])
        ->setCity($formData['city'])
        ->setCountry($formData['country'])
        ->setDetail($formData['detail'])
        ->setStatus($formData['status']);

        $this->assertEquals($expected->getUserId(), $formData['userid']);
        $this->assertEquals($expected->getTitle(), $formData['title']);
        $this->assertEquals($expected->getCountry(), $formData['country']);
        $this->assertEquals($expected->getCity(), $formData['city']);
        $this->assertEquals($expected->getDetail(), $formData['detail']);
        $this->assertEquals($expected->getStatus(), $formData['status']);
        $this->assertEquals($expected->getAddress(), $formData['address']);
    }
