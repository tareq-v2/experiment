<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection,WithHeadings
{
    // public $name = '';
    // public function __construct($name)
    // {
    //     $this->name = $name;
    // }


    // public function query()
    // {
    //     return User::query()->where('id', $this->id);
    // }


    public function headings(): array
    {
        return ["id", "name", "email"];
    }
    public function collection()
    {
        return User::get(['id', 'name', 'email']);
    }
}
