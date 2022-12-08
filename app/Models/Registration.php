<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public static function store(string $department): Registration
    {
        if (! in_array($department, config('departments')))
        {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'department' => 'Sorry! This department was not invited.'
            ]);
        }

        request()->validate([
            'employee_name' => 'required',
            'plus_one' => '',
            'kids' => 'numeric|min:0|required',
            'vegeterians' => 'numeric|required',
            'email' => 'email|required|unique:registrations,email',
        ]);

        if (request()->input('vegeterians') > request()->input('kids') + 1 + (int)request()->input('plus_one'))
        {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'vegetarians' => 'Sorry! There can\'t be more vegetarians than all invitees .'
            ]);
        }

        return Registration::create([
            'employee_name' => request()->input('employee_name'),
            'plus_one' => request()->input('plus_one') ? 1 : 0,
            'kids' => request()->input('kids'),
            'vegeterians' => request()->input('vegeterians'),
            'email' => request()->input('email'),
            'department' => $department,
        ]);
    }
}
