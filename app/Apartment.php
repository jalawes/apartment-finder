<?php

namespace App;

use App\Events\ApartmentSaved;
use Spatie\Image\Manipulations;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use VerumConsilium\Browsershot\Facades\Screenshot;

class Apartment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'url',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'screenshot_path',
        'thumbnail_path',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => ApartmentSaved::class,
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
            ->setDelay(1500)
            ->dismissDialogs();

        $directory = "public/screenshots/{$this->user_id}/{$this->id}";

        return $screenshot->storeAs($directory, 'screenshot.jpg');
    }

    /**
     * Take a screenshot of the page at the URL, and
     * save to the public screenshots directory.
     *
     * @return string|false
     */
    public function saveThumbnail()
    {
        $screenshot = Screenshot::loadUrl($this->url)
            ->useJPG()
            ->windowSize(800, 600)
            ->setDelay(1500)
            ->crop(Manipulations::CROP_TOP, 400, 300)
            ->dismissDialogs();

        $directory = "public/thumbnails/{$this->user_id}/{$this->id}";

        return $screenshot->storeAs($directory, 'thumbnail.jpg');
    }

    /**
     * Get the full path to the screenshot for the apartment listing.
     *
     * @return string
     */
    public function getScreenshotPathAttribute()
    {
        $path = storage_path("app/public/screenshots/{$this->user_id}/{$this->id}/screenshot.jpg");

        if (!file_exists($path)) {
            return null;
        }

        return asset("screenshots/{$this->user_id}/{$this->id}/screenshot.jpg");
    }

    /**
     * Get the full path to the thumbnail for the apartment listing.
     *
     * @return string
     */
    public function getThumbnailPathAttribute()
    {
        $path = storage_path("app/public/thumbnails/{$this->user_id}/{$this->id}/thumbnail.jpg");

        if (!file_exists($path)) {
            return null;
        }

        return asset("thumbnails/{$this->user_id}/{$this->id}/thumbnail.jpg");
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

    /**
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
