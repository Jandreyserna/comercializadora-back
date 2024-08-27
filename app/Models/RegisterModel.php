<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class RegisterModel
{
    public function countIdUser()
    {
        return DB::table('customer')->count();
    }

    public function countIdIdentity($identification)
    {
        return DB::table('customer')->where('identity', $identification)->count();
    }

    public function insertCustomer($data)
    {
        return DB::table('customer')->insert($data);
    }

    public function getIdentityType()
    {
        /* $datos = DB::table('identity_type')->get();
        dd($datos[0]); */
        return DB::table('identity_type')->get();
    }
}
