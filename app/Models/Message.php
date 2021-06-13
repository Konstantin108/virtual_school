<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Theme
 *
 * @property int $id
 * @property integer|null $user_id
 * @property string|null $user_name
 * @property string|null $problem_theme
 * @property string|null $theme_title
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereProblemTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereThemeTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Message extends Model
{
    /**
     * @var string
     */
    protected $table = 'messages';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'user_name',
        'problem_theme',
        'theme_title',
        'text',
        'created_at',
        'updated_at'
    ];

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return \DB::select(
            "select
                        id,
                        'user_id',
                        'user_name',
                        'problem_theme',
                        'theme_title',
                        'text',
                        'created_at',
                        'updated_at'
            ");
    }
}
