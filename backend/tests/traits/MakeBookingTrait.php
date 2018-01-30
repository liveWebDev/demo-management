<?php

use Faker\Factory as Faker;
use App\Models\Booking;
use App\Repositories\BookingRepository;

trait MakeBookingTrait
{
    /**
     * Create fake instance of Booking and save it in database
     *
     * @param array $bookingFields
     * @return Booking
     */
    public function makeBooking($bookingFields = [])
    {
        /** @var BookingRepository $bookingRepo */
        $bookingRepo = App::make(BookingRepository::class);
        $theme = $this->fakeBookingData($bookingFields);
        return $bookingRepo->create($theme);
    }

    /**
     * Get fake instance of Booking
     *
     * @param array $bookingFields
     * @return Booking
     */
    public function fakeBooking($bookingFields = [])
    {
        return new Booking($this->fakeBookingData($bookingFields));
    }

    /**
     * Get fake data of Booking
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBookingData($bookingFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $bookingFields);
    }
}
