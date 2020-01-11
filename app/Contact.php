<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class Contact extends Model
{
    protected $guarded = [];

    protected $dates = ['birthday'];

    // path is used to know how to access it's own resource
    public function path()
    {
        return url('/contacts/' . $this->id);
    }

    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::parse($birthday);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
