<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rate
 * @package App\Models
 * @package int $id
 * @package int $theme_completed_id
 * @method static \Illuminate\Database\Eloquent\Builder|Quest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereThemeCompletedId($value)
 * @mixin \Eloquent
 */
class Rate extends Model
{
    /**
     * @var string
     */
    protected $table = 'rating';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'theme_completed_id'
    ];

    /**
     * @var bool
     */
    protected $temestamps = false;

    /**
     * @return array
     */
    public function getRating(): array
    {
        return \DB::select("select id, theme_completed_id");
    }
}
