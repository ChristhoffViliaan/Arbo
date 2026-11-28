<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'url',
        'aria-label',
    ];

    public function iconClass(): string
    {
        return match (strtolower(trim($this->{'aria-label'}))) {
            'instagram' => 'fa-brands fa-instagram',
            'facebook' => 'fa-brands fa-facebook-f',
            'linkedin' => 'fa-brands fa-linkedin-in',
            'youtube' => 'fa-brands fa-youtube',
            'tiktok' => 'fa-brands fa-tiktok',
            'x', 'twitter' => 'fa-brands fa-x-twitter',
            'whatsapp' => 'fa-brands fa-whatsapp',
            'telegram' => 'fa-brands fa-telegram',
            default => 'fa-solid fa-link',
        };
    }
}
