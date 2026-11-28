<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyValues extends Model
{
    use HasFactory;

    protected $table = 'company_values';

    public $timestamps = false;

    protected $fillable = [
        'icon',
        'icon_image',
        'title',
        'description',
    ];

    public function iconImageUrl(): ?string
    {
        return $this->icon_image
            ? asset('storage/'.$this->icon_image)
            : null;
    }
}
