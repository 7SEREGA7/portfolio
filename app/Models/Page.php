<?php

  namespace App\Models;

  use Cviebrock\EloquentSluggable\Sluggable;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class Page extends Model
  {
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'content'];


    public function sluggable(): array
    {
      return [
        'slug' => [
          'source' => 'title'
        ]
      ];
    }
  }
