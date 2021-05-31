<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Quest
 *
 * @property int $id
 * @property int $theme_id
 * @property string|null $text
 * @property string|null $answer_1
 * @property string|null $answer_2
 * @property string|null $answer_3
 * @property string|null $answer_4
 * @property int|null $correct_answer
 * @property int|null $quest_number
 * @method static \Illuminate\Database\Eloquent\Builder|Quest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereThemeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereAnswer1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereAnswer2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereAnswer3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereAnswer4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereCorrectAnswer($value)
 * method static \Illuminate\Database\Eloquent\Builder|Quest whereQuestNumber($value)
 * @mixin \Eloquent
 */
class Quest extends Model
{
    /**
     * @var string
     */
    protected $table = 'questions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'theme_id',
        'text',
        'answer_1',
        'answer_2',
        'answer_3',
        'answer_4',
        'correct_answer',
        'quest_number'
    ];

    /**
     * @var bool
     */
    protected $temestamps = false;

    /**
     * @return BelongsTo
     */
    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class, 'theme_id', 'id');
    }
}
