<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class RegisterModel
{
    public function countIdUser()
    {
        return DB::table('users')->count();
    }

    public function countIdIdentity($identification)
    {
        return DB::table('users')->where('id_identity', $identification)->count();
    }

    public function validateTutorIdentity($identificationTutor)
    {
        return DB::table('tutors')->where('identity', $identificationTutor)->get();
    }

    public function countIdTutors()
    {
        return DB::table('tutors')->count();
    }

    public function insertUser($data)
    {
        return DB::table('users')->insert($data);
    }

    public function insertTutor($data)
    {
        return DB::table('tutors')->insert($data);
    }

    public function getIdentityType()
    {
        return DB::table('identity_type')->get();
    }
}
