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
     * Get image from url with specified size
     *
     * @param width
     * @param height
     * @return \Intervention\Image\Facades\Image
     */
    public function index($width, $height)
    {
        $img = Image::make(request('url'))->fit($width, $height);

        return $img->response($img->mime());
    }

    protected function getImageFile($cover)
    {
        try {
            return Storage::get($cover);
        } catch (Exception $e) {
            return Storage::get($this->coverPath . 'default.jpg');
        }
    }

    /**
     * Get the image of the specified filename
     *
     * @param $cover
     * @return \Intervention\Image\Facades\Image
     */
    public function getCoverImage($cover)
    {
        $img = $this->getImageFile($this->coverPath . $cover);
        $cover = Image::make($img);

        return $cover->response($cover->mime());
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
        $image = Image::make($img);

        return $image->response($image->mime());
    }
}
