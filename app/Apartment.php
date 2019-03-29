<?php

namespace App;

use Illuminate\Support\Str;
use App\Events\ApartmentSaving;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Database\Eloquent\Model;
use VerumConsilium\Browsershot\Facades\Screenshot;

class Apartment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'url',
        'user_id',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saving' => ApartmentSaving::class,
    ];

    /**
     * Take a screenshot of the page at the URL, and
     * save to the public screenshots directory.
     *
     * @return string|false
     */
    public function takeScreenshot()
    {
        $screenshot = Screenshot::loadUrl($this->url)
            ->useJPG()
            ->windowSize(1920, 1080)
            ->waitUntilNetworkIdle()
            ->dismissDialogs();

        return $screenshot->storeAs('public/screenshots', $this->filename);
    }

    /**
     * Get the full path to the image for the apartment listing.
     *
     * @return string
     */
    public function getFilenameAttribute()
    {
        return Str::kebab("{$this->url}.jpg");
    }

    /**
     * Url attribute accessor.
     * Sanitzes the url attribute since it includes user input.
     *
     * @param string $url
     *
     * @return string
     */
    public function getUrlAttribute($url)
    {
        return Purify::clean($url);
    }
}
