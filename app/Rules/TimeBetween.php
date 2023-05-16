<?php

namespace App\Rules;
use Carbon\Carbon;

use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pickupDate = Carbon::parse($value);
        $pickupTime = carbon::createFromTime($pickupDate->hour , $pickupDate->minute , $pickupDate->second);
        // when the reustrant open
        $earlistTime = carbon::createFromTimeString('17:00:00');
        $lastTime = carbon::createFromTimeString('23:00:00');
        return $pickupTime->between($earlistTime , $lastTime) ? true :false ;



    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'please choose a date between 17:00:00 and 23:00:00 .';
    }
}
