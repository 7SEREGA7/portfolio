<?php

  namespace App\Models;

  use Cviebrock\EloquentSluggable\Sluggable;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  use Carbon\Carbon;

  class Post extends Model
  {
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'description', 'content'];

    public function sluggable(): array
    {
      return [
        'slug' => [
          'source' => 'title'
        ]
      ];
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class);
    }

    public function getPostDate()
    {
      return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d M Y');
    }
  }
