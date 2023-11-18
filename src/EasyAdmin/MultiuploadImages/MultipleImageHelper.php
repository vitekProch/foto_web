<?php

namespace App\EasyAdmin\MultiUploadImages;
use Symfony\Component\HttpKernel\KernelInterface;

class MultipleImageHelper
{
    public function __construct(KernelInterface $appKernel)
    {
        $this->appKernel = $appKernel;

    }
    function generateUniqueFileName(string $currentFileName): string
    {
        $fileSplit = explode( '.', $currentFileName );
        return $fileSplit[0] . '-' . md5(microtime())  . '.' . end($fileSplit);
    }

    public function deleteReviewFromDirectory(string $reviewToRemovePath): void
    {
        $deleteImgPath = $this->appKernel->getProjectDir().
            '/public' . $reviewToRemovePath;
        if(file_exists($deleteImgPath)) unlink($deleteImgPath);
    }
}