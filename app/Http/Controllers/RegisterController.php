<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterModel;

class RegisterController extends Controller
{
    protected $registerModel;

    public function __construct(RegisterModel $registerModel)
    {
        $this->registerModel = $registerModel;
    }

    public function registerUser(Request $request)
    {
        try {
            $data = $request->all();
            $userData = $this->prepareUserData($data);

            if ($this->isUserRegistered($data['identification'])) {
                return response()->json(['success' => false, 'message' => 'Este usuario ya se encuentra registrado']);
            }

            $completeUserData = array_merge($userData, $this->mapUserData($data));

            $userState = $this->registerModel->insertUser($completeUserData);

            return response()->json(['success' => true, 'data' => $completeUserData['user_id']]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al registrar el usuario', 'error' => $e->getMessage()]);
        }
    }

    protected function prepareUserData($data)
    {
        $countUsers = $this->registerModel->countIdUser();
        return [
            'user_id' => $countUsers + 1,
            'created_at' => now()
        ];
    }

    protected function isUserRegistered($identification)
    {
        $countIdIdentity = $this->registerModel->countIdIdentity($identification);
        return $countIdIdentity !== 0;
    }



    protected function mapUserData($data)
    {
        return [
            'id_type' => $data['idType'],
            'id_identity' => $data['identification'],
            'name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'genero' => $data['genero'],
            'city' => $data['city'],
            'phone_number' => intval($data['phoneNumber']),
            'birth_date' => $data['birthDate'],
            'email' => $data['email'],
            'password' => $data['identification']
        ];
    }

    public function identityTypes()
    {
        try {
            $identityType = $this->registerModel->getIdentityType();
            return response()->json(['success' => true, 'data' => $identityType]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al obtener los tipos de identidad', 'error' => $e->getMessage()]);
        }
    }
}
