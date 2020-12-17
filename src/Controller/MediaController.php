<?php

namespace MartenaSoft\Media\Controller;

use MartenaSoft\Media\Entity\Media;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;

class MediaController extends AbstractController
{
    private ParameterBagInterface $parameterBag;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    public function index(): Response
    {
        dump($this->parameterBag->get('images_path')); die;
        return $this->render('@MartenaSoftMedia/frontend/index.html.twig');
    }
}