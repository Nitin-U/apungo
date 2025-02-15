<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


trait ImageUpload {

    /**
     * Upload an image and optionally resize it.
     *
     * @param  UploadedFile  $image
     * @param  int  $width
     * @param  int $height
     * @return array
     */
    protected function generalUploadImage($image, $width, $height): array
    {
        // Validate image type
        if (!$image->isValid()) {
            return ['status'=>false];
        }

        // Generate unique name for image
        $name        = $this->folder_name.'/'.uniqid().$image->getClientOriginalName();

        // Ensure directory exists, create if it doesn't exists
        if (!is_dir($this->image_path.$this->folder_name)) {
            File::makeDirectory($this->image_path.$this->folder_name, 0777, true);
        }

        // Process image with optional resizing
        $status = Image::make($image->getRealPath())->orientate();

        // If heingh and width is provided, resize the image
        if($width && $height){
            $status = $status->fit($width,$height);
        }

        // Save processed image
        $status = $status->save($this->image_path.$name);

        // Optionally generate a thumbnail if dimensions are defined in config
        if ($thumbnailDimensions = config('thumbnail_dimension.'.$this->folder_name)){
            $thumb_name     = getThumbImageName($name);
            Image::make($image->getRealPath())->fit($thumbnailDimensions['width'], $thumbnailDimensions['height'])->orientate()->save($this->image_path.$thumb_name);
        }

        return ['status'=>$status, 'name'=>$name];
    }

    /**
     * Upload an image.
     * @param UploadedFile $image
     * @param int|null     $width
     * @param int|null     $height
     * @return string
     */
    protected function uploadImage($image,$width=null,$height=null): string
    {
        //call the common function for image upload
        $result = $this->generalUploadImage($image,$width,$height);

        //if the status is true, return the image name to store in the database
        if ($result['status']) {
            return $result['name'];
        }
    }

    /**
     * Update an image, delete the old one.
     *
     * @param UploadedFile $image
     * @param  string|null $image_name
     * @param  int|null    $width
     * @param  int|null    $height
     * @return string|null
     */
    protected function updateImage($image,$image_name=null,$width=null,$height=null)
    {
        //call the common function for image upload
        $result = $this->generalUploadImage($image,$width,$height);

        //if the status is true, remove the old image from storage and return the image name to store in the database
        if ($result['status']) {

            if (!empty($image_name)){
                $this->deleteImage($image_name);
            }

            return $result['name'];
        }
    }

    /**
     * Delete an image and its thumbnail.
     *
     * @param  string  $image
     * @return void
     */
    protected function deleteImage($image)
    {
        //get the thumbnail image if it exists
        $thumb_name = getThumbImageName($image);

        //remove the image file from the storage
        if (!empty($image) && file_exists($this->image_path.$image)){
            @unlink($this->image_path.DIRECTORY_SEPARATOR.$image);
        }

        //remove the thumbnail image file from the storage
        if (!empty($thumb_name) && file_exists($this->image_path.$thumb_name)){
            @unlink($this->image_path.$thumb_name);
        }
    }

    /**
     * Delete a gallery image if it exists.
     *
     * @param $image
     * @param $folder_name
     * @return void
     */
    protected function deleteGalleryImage($image,$folder_name)
    {
        //remove the gallery images if it exists
        $image_path = $folder_name.DIRECTORY_SEPARATOR.$image;
        if (!empty($image) && file_exists($this->image_path.$image_path)){
            @unlink($this->image_path.DIRECTORY_SEPARATOR.$image_path);
        }
    }

    /**
     * Upload a file (non-image).
     *
     * @param UploadedFile $file
     * @return string|null
     */
    public function uploadFile($file)
    {
        // Generate a unique file name using the original file name and folder
        $name = $this->folder_name.'/'.uniqid().$file->getClientOriginalName();

        // Check if the directory exists, if not, create it
        if (!is_dir($this->file_path.$this->folder_name)) {
            File::makeDirectory($this->file_path.$this->folder_name, 0777, true);
        }

        // Store the uploaded file in the specified directory
        $status = $file->move($this->file_path . $this->folder_name, $name);

        //if the file is uploaded, return the file name
        if ($status){
            return $name;
        }
    }

    /**
     * Delete a file if it exists.
     *
     * @param string $file
     * @return void
     */
    public function deleteFile($file){
        //fetch the file path from the controller
        $existingFilePath = $this->file_path . $file;

        //if the file is found, remove it
        if (File::exists($existingFilePath)) {
            File::delete($existingFilePath);
        }
    }
}
