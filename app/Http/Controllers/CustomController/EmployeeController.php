<?php

namespace App\Http\Controllers\CustomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\employee;
use App\Models\employee_salary;
const SALARY_TECNICO = 1900000;
const SALARY_GERENTE = 10000000;

class EmployeeController extends Controller
{

    public function store(Request $request){
        $employee = new employee();
        $employee->documento = $request->documento;
        $employee->telefono = $request->telefono;
        $employee->nombres = $request->nombres;
        $employee->direccion = $request->direccion;
        $employee->role_id = $request->role_id;
        $employee->save();

        $salary = new employee_salary();
        $salary->employee_id = $employee->id;
        switch ($request->role_id) {
            case '1':
                $salary->salario = SALARY_TECNICO;
                $salary->impuestos = SALARY_TECNICO *0.08;
                $salary->salud = SALARY_TECNICO *0.08;
                $salary->pension = SALARY_TECNICO *0.5; 
                $salary->valor_prima = SALARY_TECNICO *2; 
                $salary->save();   
                break;
                case '2':
                    $salary->salario = SALARY_GERENTE;
                    $salary->impuestos = SALARY_GERENTE *0.08;
                    $salary->salud = SALARY_GERENTE *0.08;
                    $salary->pension = SALARY_GERENTE *0.5;  
                    $salary->valor_prima = SALARY_GERENTE *2; 
                    $salary->save();   
                    break;
            
            default:
                # code...
                break;
        }
        return response()->json(['message'=>'Empleado: '.$employee->nombre. 'creado satisfactoriamente','data'=>$employee]);
        
    }

     public function show()
    {
        return employee::all();

    }
}
