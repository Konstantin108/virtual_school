<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Theme
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereStatus($value)
 * @mixin \Eloquent
 */
class Theme extends Model
{
    /**
     * @var string
     */
    protected $table = "themes";

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'text',
        'created_at',
        'updated_at',
        'status'
    ];

    /**
     * @return HasMany
     */
    public function quest(): HasMany
    {
        return $this->hasMany(Quest::class, 'theme_id', 'id');
    }
}
