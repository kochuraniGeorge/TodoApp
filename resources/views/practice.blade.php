// UserController.php

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ...

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        // Validation passed; create the user or perform other tasks
        // ...

        return redirect('home'); // Redirect to a success page
    }
}
