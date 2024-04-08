<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;
    protected $table='students';
    public function  getAllStudents(){
        return DB::select('SELECT * FROM ' .$this->table);
    }
    public function addStudent($data){
        DB::insert(
            'INSERT INTO '.$this->table . '(name, phone) values (?,?)',
            $data
        );
    }
    public function deleteStudents($id){
        return DB::delete('DELETE FROM ' .$this->table .' where id=?' ,[$id]);
    }
    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id=?', [$id]);
    }
    public function updateStudent($data, $id)
    {
        $data[] = $id;
        return DB::update('UPDATE ' . $this->table . ' SET name=?, phone=?  WHERE id=?', $data);

    }
    // public function searchStudent($keywword)
    // {
    //     return DB::select('SELECT * FROM '. $this->table . 'WHERE name LIKE :?',$keywword);

    // }
}
