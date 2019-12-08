<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdditionalDataController extends Controller
{
    function get(Request $request) {
        $data = [];

        foreach ($request->all() as $filter=>$item) {
            switch ($filter) {
                case 'payment_methods':
                    $data[$filter] = $this->payment_methods();
                    break;
            }
        }

        return $data;
    }

    private function payment_methods() {
        return config('settings.payment_methods');
    }
}
