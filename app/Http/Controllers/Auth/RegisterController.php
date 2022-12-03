<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserSkill;
use App\Models\Skill;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // La méthode create pour les users créée par défaut par Laravel prend un array en paramètre
        // Or, pour pouvoir faire appel à des méthodes spécifiques concernant l'image de profil
        // telles que la récupération de l'extension, je dois faire une variante objet de cet array
        $request = new Request($data);
        if($request->image != NULL)
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('images', $imageName);
        }
        

        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'role' => $data['role'],
            'email' => $data['email'],
            'image' => $request->image == NULL ? NULL : $imageName,
            'password' => Hash::make($data['password']),
            'admin' => '0',
        ]);

    
        
        
        

        

        $id = $user->id;
        if(isset($data['skills']) && $data['role'] == "Candidat")
        {
            foreach($data['skills'] as $skill)
            {
                $userskill = UserSkill::create([
                    'user_id' => $id,
                    'skill_id' => $skill,
                ]);
            }
        }
        
        return $user;
    }

    public function showRegistrationForm()
    {
        return view('auth.register', ['skills' => Skill::All()]);
    }
}
