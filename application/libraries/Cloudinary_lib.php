<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cloudinary_lib
{
    public function __construct()
    {
        // configure Cloudinary API connection
        \Cloudinary::config(array(
            "cloud_name" => PROJ_CLDNRY_CLOUD_NAME,
            "api_key" => PROJ_CLDNRY_API_KEY,
            "api_secret" => PROJ_CLDNRY_API_SECRET
        ));
    }

    function uploadImageToCloudinary($image_file,$postVal=array()){
        if(CLDNRY_ACCESS && IMAGE_UPLOAD_TO_CLOUD) {
            if (is_array($postVal) && count($postVal) > 0) {
                $image = \Cloudinary\Uploader::upload($image_file, $postVal);
            } else {
                $image = \Cloudinary\Uploader::upload($image_file);
            }
            return $image;
        }
        return TRUE;
    }

    function delImageFromCloudinary($image_id){
        if(CLDNRY_ACCESS && IMAGE_UPLOAD_TO_CLOUD) {
            $image = \Cloudinary\Uploader::destroy($image_id);
            return $image;
        }
        return TRUE;
    }

    function getImageFromCloud($image_url,$postVal=array()){
		return cl_image_tag($image_url, $postVal);
	}
}
?>
