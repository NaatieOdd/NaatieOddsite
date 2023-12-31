<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
            ->orWhere('creator', 'like', '%' . $keyword . '%');
    }

}

