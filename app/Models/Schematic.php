<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Schematic extends Model
{
    protected $fillable = ['title', 'description', 'creator', 'file'];

    /**
     * Get the URL for the file attribute.
     *
     * @return string
     */
    public function getFileUrlAttribute()
    {
        // Assuming your files are stored in the public disk
        return asset('storage/' . $this->file);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->orWhereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}

