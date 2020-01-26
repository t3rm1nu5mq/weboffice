<?php

    namespace App\Helpers;

    use App\Address;
    use App\Invoice;

    class Helper {
        public function get_address ($id) {
            $data = Address::with('country', 'city', 'city.county')->where('id', $id)->first();
            (object) $address = null;
            $address->country = $data->country['name'];
            $address->county = $data->city['county']['name'];
            $address->city = $data->city->name;
            $address->zip_code = $data->city['zip_code'];
            $address->street = $data->street;
            $address->house = $data->house;
            $address->floor = $data->floor;
            $address->door = $data->door;

            return $address;
        }


        /**
         * Számla számának generálására szolgáló function
         * A szám generálásánál figyelembe veszi, hogy a számnak egyedinek kell lennie
         *
         * @return int|string
         */
        public static function create_invoice_number () {
            $invoice_number = "";
            $invoice = null;

            do {
                $invoice_number = rand(100000000000, 999999999999);
                $invoice = Invoice::where('invoice_number', $invoice_number)->first();
            } while (!empty($invoice));

            return $invoice_number;
        }
    }
