<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class EmployeeController
 * This Class Contains Pegawai Endpoint
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{

    /**
     * Function getEmployee
     * This Function is Used to Retrieve Employee Data
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEmployee(Request $request) {
        $validate = Validator::make($request->all(),[
            'page' => 'int'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'result' => null,
                'message' => 'Bad Request',
                'status' => 400,
                'error' => true
            ],400);
        }
        $employee = Employee::select('nama','tanggal_masuk','total_gaji')->paginate(100);
        if (sizeof($employee) > 0) {
            foreach ($employee->items() as $e) {
                $e->nama = strtoupper(explode(" ",$e->nama)[0]);
                $e->tanggal_masuk = date("d/m/Y", strtotime($e->tanggal_masuk));
                $e->total_gaji = number_format($e->total_gaji, 0, ",",".");
            }
            return response()->json([
                'result' => $employee,
                'message' => 'OK',
                'status' => 200,
                'error' => false
            ],200);
        } else {
            return response()->json([
                'result' => null,
                'message' => 'No Data',
                'status' => 204,
                'error' => true
            ],200);
        }
    }
}
