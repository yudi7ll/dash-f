<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;
use Image;

class ImageController extends Controller
{
    private $coverPath = 'public/images/cover/';
    private $coverThumbPath = 'public/images/thumb/';

    /**
     * Get image from storage of the specified filename
     *
     * @param string $cover
     * @return mixed
     */
    protected function getImageFile($cover)
    {
        try {
            return Storage::get($cover);
        } catch (Exception $e) {
            // if the file doesn't exists
            return Storage::get($this->coverThumbPath . 'default.jpg');
        }
    }

    /**
     * Get the cover image of the specified filename
     *
     * @param $cover
     * @return \Intervention\Image\Facades\Image
     */
    public function getCoverImage($cover)
    {
        $img = $this->getImageFile($this->coverPath . $cover);
        return Image::make($img)->response();
    }

    /**
     * Get the cover thumbnail of the specified filename
     *
     * @param $cover
     * @return \Intervention\Image\Facades\Image
     */
    public function getCoverThumb($cover)
    {
        $img = $this->getImageFile($this->coverThumbPath . $cover);

        return Image::make($img)->response();
    }

    /**
     * Store the thumbnail and the original image of the specified images
     *
     * @param $cover
     * @return string $filename
     */
    public function store($request, $username)
    {
        // don't do anything if there is no cover file
        if (! $request->hasFile('cover')) {
            return false;
        }

        $cover = $request->file('cover');
        $img = Image::make($cover);
        $filename = $username . '.jpg';

        // path
        $fullPath = $this->coverPath . $filename;
        $fullPathThumb = $this->coverThumbPath . $filename;

        // upload original image
        $img->save(Storage::path($fullPath));
        // upload thumbnail image
        $img->fit(50)->save(Storage::path($fullPathThumb));

        return $filename;
    }
}
