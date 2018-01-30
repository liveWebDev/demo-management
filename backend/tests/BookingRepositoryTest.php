<?php

use App\Models\Booking;
use App\Repositories\BookingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookingRepositoryTest extends TestCase
{
    use MakeBookingTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BookingRepository
     */
    protected $bookingRepo;

    public function setUp()
    {
        parent::setUp();
        $this->bookingRepo = App::make(BookingRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateBooking()
    {
        $booking = $this->fakeBookingData();
        $createdBooking = $this->bookingRepo->create($booking);
        $createdBooking = $createdBooking->toArray();
        $this->assertArrayHasKey('id', $createdBooking);
        $this->assertNotNull($createdBooking['id'], 'Created Booking must have id specified');
        $this->assertNotNull(Booking::find($createdBooking['id']), 'Booking with given id must be in DB');
        $this->assertModelData($booking, $createdBooking);
    }

    /**
     * @test read
     */
    public function testReadBooking()
    {
        $booking = $this->makeBooking();
        $dbBooking = $this->bookingRepo->find($booking->id);
        $dbBooking = $dbBooking->toArray();
        $this->assertModelData($booking->toArray(), $dbBooking);
    }

    /**
     * @test update
     */
    public function testUpdateBooking()
    {
        $booking = $this->makeBooking();
        $fakeBooking = $this->fakeBookingData();
        $updatedBooking = $this->bookingRepo->update($fakeBooking, $booking->id);
        $this->assertModelData($fakeBooking, $updatedBooking->toArray());
        $dbBooking = $this->bookingRepo->find($booking->id);
        $this->assertModelData($fakeBooking, $dbBooking->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteBooking()
    {
        $booking = $this->makeBooking();
        $resp = $this->bookingRepo->delete($booking->id);
        $this->assertTrue($resp);
        $this->assertNull(Booking::find($booking->id), 'Booking should not exist in DB');
    }
}
