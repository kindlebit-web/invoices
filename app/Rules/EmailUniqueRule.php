<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Customer;

class EmailUniqueRule implements Rule
{
        private function queryCheck($attribute, $value, $opr)
        {
             return Customer::where([
                $attribute => $value,
                'user_id' => auth()->user()->id, 
                ])->where('id', $opr, request()->segment(2))->first();
        }

        /**
        * Create a new rule instance.
        *
        * @return void
        */
        public function __construct()
        {

        }

        /**
        * Determine if the validation rule passes.
        *
        * @param string $attribute
        * @param mixed $value
        * @return bool
        */
        public function passes($attribute, $value)
        {
             $customer = $this->queryCheck($attribute, $value, '=');
              if($customer) {
            return true;
            }
            $customer = $this->queryCheck($attribute, $value, '!=');
            if($customer) {
            return false;
            }
            return true;
        }

        /**
        * Get the validation error message.
        *
        * @return string
        */
        public function message()
        {
           return 'You have already registered a customer with this email.';
        }
}
