<?php

namespace App;

use Illuminate\Support\Arr;
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'filename',
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
            ->fullPage()
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
        $components = parse_url($this->url);
        $host = Arr::get($components, 'host');
        $path = Arr::get($components, 'path');
        $slug = Str::slug(
            implode('-', array_filter([$host, $path]))
        );

        return Str::kebab("{$slug}.jpg");
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
