<?php

  namespace App\Models;

  use Carbon\Carbon;
  use Cviebrock\EloquentSluggable\Sluggable;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Storage;

  class Work extends Model
  {
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'description', 'content', 'thumbnail'];

    public function sluggable(): array
    {
      return [
        'slug' => [
          'source' => 'title'
        ]
      ];
    }

    public function types()
    {
      return $this->belongsToMany(Type::class);
    }

    public static function uploadImage(Request $request, $image = null)
    {
      if ($request->hasFile('thumbnail')) {
        if ($image) {
          Storage::delete($image);
        }
        $folder = date('Y-m-d');
        return $request->file('thumbnail')->store("images/{$folder}");
      }
      return null;
    }

    public function getImage()
    {
      if (!$this->thumbnail) {
        return asset("assets/noimage.jpg");
      }
      return asset("uploads/$this->thumbnail");
    }

    public function getWorkDate()
    {
      return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y');
    }
  }
