<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $primaryKey = 'id_tugas';

    protected $fillable = [
        'id_user', 'id_ruang', 'status', 'bukti1', 'bukti2', 'bukti3', 'bukti4', 'bukti5',
    ];

    public function user()
    {
        $this->hasMany(User::class);
    }
}
