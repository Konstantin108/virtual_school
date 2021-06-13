<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rate
 *
 * @property int $id
 * @property int $theme_completed_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Quest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereThemeCompletedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereUpdatedAt($value)
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
        'theme_completed_id',
        'user_id',
        'created_at',
        'updated_at'
    ];

    /**
     * @return array
     */
    public function getRating(): array
    {
        return \DB::select("select id, theme_completed_id, user_id");
    }
}
