<?php

    namespace App\Http\Controllers\API;

    use App\Helpers\Helper;
    use App\Http\Controllers\Controller;
    use App\User;
    use App\Message;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;

    class MessagingController extends Controller {
        public function index () {
            //
        }

        public function sendContactMessage (Request $request) {
            // felhasználó regisztrálása
            $user = User::where('email', $request->email)
                        ->first();
            if (empty($user)) {
                $helper = new Helper();
                $password = $helper->generate_invite_code();
                $user = User::create([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            }

            $message = Message::create([
                'user_id' => $user->id,
                'message' => $request->message,
            ]);

            return response()->json([
                'name' => $request->name
            ]);
        }
    }
