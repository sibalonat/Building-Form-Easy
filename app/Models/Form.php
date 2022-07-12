<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;


    public static function booted()
    {
        static::creating(function(Form $form) {
            $form->identifier = (string) Str::uuid();
            $form->user_id = auth()->user()->id;
        });
    }

    const FORM_PUBLIC = 'PUBLIC';
    const FORM_PRIVATE = 'PRIVATE';

    public static $visibility_options = [
        ['id' => self::FORM_PUBLIC, 'name' => self::FORM_PUBLIC.' (available to all users)'],
        ['id' => self::FORM_PRIVATE, 'name' => self::FORM_PRIVATE.' (available to only logged in users)'],
    ];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'user_id',
    ];


    /**
     * The attributes that should be casted to another data type.
     *
     * @var array
     */
    protected $casts = [
        'multi_tab' => 'boolean',
    ];

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    /**
     * Scope publicly visible forms.
     *
     * @param Illuminate\Database\Eloquent\Builder $query
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopePublic($query)
    {
        return $query->where('visibility', self::FORM_PUBLIC);
    }

    /**
     * Check if the form has public visibility.
     *
     * @return bool
     */
    public function isPublic(): bool
    {
        return $this->visibility === self::FORM_PUBLIC;
    }

    /**
     * Check if the form has private visibility.
     *
     * @return bool
     */
    public function isPrivate(): bool
    {
        return $this->visibility === self::FORM_PRIVATE;
    }

    // user functions
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get a json decoded version of the form_builder_json string.
     *
     * @return array
     */
    public function getFormBuilderArrayAttribute($value): array
    {
        return json_decode($this->attributes['form_builder_json'], true);
    }


    /**
     * Get the forms that belong to the provided user.
     *
     * @param User $user
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getForUser($user)
    {
        return static::where('user_id', $user->id)
            ->withCount('submissions')
            ->latest()
            ->paginate(100);
    }

    //type of forms
    /**
     * Check if the form allows edit.
     *
     * @return bool
     */
    public function multiTab(): bool
    {
        return $this->multi_tab;
    }

    /**
     * Get an array containing the name of the fields in the form and their label.
     *
     * @return Illuminate\Support\Collection
     */
    public function getEntriesHeader(): Collection
    {
        return collect($this->form_builder_array)
                    ->filter(function ($entry) {
                        return ! empty($entry['name']);
                    })
                    ->map(function ($entry) {
                        return [
                            'name' => $entry['name'],
                            'label' => $entry['label'] ?? null,
                            'type' => $entry['type'] ?? null,
                            // 'content' => $entry['values'] ?? null,
                        ];
                    });
    }
}
