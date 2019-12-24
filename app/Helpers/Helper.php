<?php

    namespace App\Helpers;

    use App\Address;

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
    }
