<?php

namespace App\Http\Controllers;

use App\Facades\JsonOutputService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function updateStatus(Request $request)
    {
        $data = $request->only('id', 'status', 'table');
        $model = DB::table($data['table'])->where('id', $data['id'])->update(['status' => !$data['status']]);

        $message = 'Status Updated';
        if (!$model) {
            $message = 'Something went wrong';
        }

        return JsonOutputService::setMessage($message)->response();
    }
}
