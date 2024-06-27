<?php
class DashboardFileHelper
{

    public $fileName;
    public $sliderItem;
    function UploadFile($image)
    {

        $fileName = time() . '-' . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
        $fileType = $image->getClientOriginalExtension();
        if ($fileType == 'jpg' || $fileType  == 'png' || $fileType == 'jpeg' || $fileType == 'webp') {
            $image->move(public_path('uploads'), $fileName);
            return  $this->fileName = $fileName;
        }
    }

    function DeleteFile($sliderItem)
    {
        if (file_exists($sliderItem->image)) {
            if (!empty($sliderItem->image)) {
                unlink(public_path('uploads') . '/' . $sliderItem->image);
            };
        }
        return $this->sliderItem = $sliderItem;
    }
}
