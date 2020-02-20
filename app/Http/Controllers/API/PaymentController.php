<?php

    namespace App\Http\Controllers\API;

    use App\Helpers\Helper;
    use App\Invoice;
    use App\Partner;
    use App\Payment;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;

    class PaymentController extends Controller {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function index () {
            $data = Payment::with('invoice')->all();

            return response()->json([
                'data' => $data
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create () {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function store (Request $request) {
            DB::beginTransaction();

            $payment = new Payment; // fizetési tranzakció létrehozása
            $payment->partner_id = $request->partner;
            $payment->type = $request->type;
            $payment->payment_method = $request->payment_method;
            $payment->amount = $request->amount;
            $payment->paid = $request->paid;
            $payment->deadline = $request->deadline;
            $payment->save();
            if (isset($request->with_invoice) && $request->with_invoice) {
                $this->create_invoice($payment->id); // a fizetési tranzakcióhoz számla generálása
            }

            DB::commit();

            return response()->json([
                'message'     => trans("messages.store_success"),
                'result_code' => 201
            ]);
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\JsonResponse
         */
        public function show ($id) {
            $payment = Payment::where('id', $id)->first();

            if (isset($payment)) {
                return response()->json([
                    'data' => $payment
                ]);
            } else {
                return response()->json([
                    'message' => config("settings.error_codes.not_found_exception.message"),
                    'result_code' => config("settings.error_codes.not_found_exception.code")
                ]);
            }

        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function edit ($id) {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int                      $id
         * @return \Illuminate\Http\Response
         */
        public function update (Request $request, $id) {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\JsonResponse
         * @throws \Exception
         */
        public function destroy ($id) {
            $payment = Payment::with('invoice')->find($id);

            if (!empty($payment)) {
                if (isset($payment->invoice)) {
                    return response()->json([
                        'message'     => config("settings.error_codes.has_invoice_delete_exception.message"),
                        'result_code' => config("settings.error_codes.has_invoice_delete_exception.code")
                    ]);
                } else {
                    $payment->delete();

                    return response()->json([
                        'message'     => trans("messages.delete_success"),
                        'result_code' => 202
                    ]);
                }
            } else {
                return response()->json([
                    'message'     => config("settings.error_codes.not_found_exception.message"),
                    'result_code' => config("settings.error_codes.not_found_exception.code")
                ]);
            }

        }

        ######################
        ## fizetési típusok ##
        ######################
        public function create_payment () {

        }

        ######################
        ## számlák kezelése ##
        ######################--------------------------------------------------#
        # Számlák létrehozására, megjelenítésére, törlésére szolgáló függvények #
        #-----------------------------------------------------------------------#
        // számla létrehozása
        function create_invoice ($payment_id) {
            $filename = $this->GenUID();
            $invoice_number = Helper::create_invoice_number();

            $invoice = new Invoice;
            $invoice->payment_id = $payment_id;
            $invoice->filename = $filename;
            $invoice->invoice_number = $invoice_number;
            $invoice->save();
        }
    }
