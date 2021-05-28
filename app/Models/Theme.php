<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Theme extends Model
{
    use HasFactory;

    protected $table = "themes";

    public function getThemes(): Collection
    {
        return \DB::table($this->table)->get();
    }

    /**
     * @param int $id
     */
    public function getThemeById(int $id)
    {
        return \DB::selectOne("
            SELECT
                 id,
                 title,
                 text,
                 created_at,
                 updated_at
            FROM
                themes
            WHERE
                id = :id
            ",
            ['id' => $id]
        );
    }
}
