<?php

namespace MartenaSoft\Media\Controller;

use MartenaSoft\Media\Entity\Media;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MediaController extends AbstractController
{
    public function tags(?Media $media): Response
    {
        if (empty($media)) {
            $media = new Media();
        }
        return $this->render('@MartenaSoftMedia/media/media.html.twig', [
            'entity' => $media
        ]);
    }
}