<?php

    namespace App\Http\Controllers\API;

    use App\Http\Controllers\Controller;
    use App\Partner;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class PartnerController extends Controller {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index () {
            $partners = Partner::with('main_address', 'main_address.country', 'main_address.city')->get();

            return response()->json(['data' => $partners]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create () {
            return view('partners.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store (Request $request) {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function show ($id) {
            $partner = Partner::find($id);

            return response()->json(['data' => $partner]);
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
            $partner = Partner::find($id);

            DB::beginTransaction();
            $partner->save();
            DB::commit();
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy ($id) {
            $partner = Partner::where('id', $id)->first();

            DB::beginTransaction();
            $partner->delete();
            DB::commit();
        }

        public function partners_count () {
            $data = Partner::count();

            return response()->json([
                'data' => $data
            ]);
        }
    }
