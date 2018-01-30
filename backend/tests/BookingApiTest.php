<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookingApiTest extends TestCase
{
    use MakeBookingTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateBooking()
    {
        $booking = $this->fakeBookingData();
        $this->json('POST', '/api/v1/bookings', $booking);

        $this->assertApiResponse($booking);
    }

    /**
     * @test
     */
    public function testReadBooking()
    {
        $booking = $this->makeBooking();
        $this->json('GET', '/api/v1/bookings/'.$booking->id);

        $this->assertApiResponse($booking->toArray());
    }

    /**
     * @test
     */
    public function testUpdateBooking()
    {
        $booking = $this->makeBooking();
        $editedBooking = $this->fakeBookingData();

        $this->json('PUT', '/api/v1/bookings/'.$booking->id, $editedBooking);

        $this->assertApiResponse($editedBooking);
    }

    /**
     * @test
     */
    public function testDeleteBooking()
    {
        $booking = $this->makeBooking();
        $this->json('DELETE', '/api/v1/bookings/'.$booking->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/bookings/'.$booking->id);

        $this->assertResponseStatus(404);
    }
}
