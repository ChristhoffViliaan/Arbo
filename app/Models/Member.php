<?php

namespace App\Models;

use Database\Factories\MemberFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /** @use HasFactory<MemberFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'title',
        'image',
    ];

    public function imageUrl(): string
    {
        if (str_starts_with($this->image, 'uploads/members/')) {
            return asset('storage/'.$this->image);
        }

        return asset('images/'.ltrim($this->image, '/'));
    }
}
