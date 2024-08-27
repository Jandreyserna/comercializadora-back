<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function users()
    {
        $identityTypes = [
        ['id' => 1, 'type' => 'Passport'],
        ['id' => 2, 'type' => 'Driver License'],
        ['id' => 3, 'type' => 'National ID'],
    ];

    return response()->json($identityTypes);
    }
}
