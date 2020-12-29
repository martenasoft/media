<?php

namespace MartenaSoft\Media\Controller;


use MartenaSoft\Common\Event\CommonFormEventInterface;
use MartenaSoft\Crud\Controller\AbstractCrudController;
use MartenaSoft\Crud\Event\CrudAfterFindEvent;

class MediaConfigAdminController extends AbstractCrudController
{
    protected function initListener(): void
    {
        $this
            ->getEventDispatcher()
            ->addListener(CrudAfterFindEvent::getEventName(), function (CommonFormEventInterface $event) {
            $data = $event->getEntity();

            if (!empty($name = $event->getRequest()->get('name'))) {
                $data->setName($name);
                $event->getForm()->setData($data);
            }

        });
    }

    protected function getConfigButtonUrl(): string
    {
        return '';
    }

    protected function getClassPrefix(): string
    {
        return 'MediaConfig';
    }
    protected function getSaveTemplate(): string
    {
        return '@MartenaSoftMedia/mediaConfig/save.html.twig';
    }

    protected function getH1(): string
    {
        return 'Media Config';
    }

    protected function getTitle(): string
    {
        return 'Media Config';
    }

    protected function itemsFields(): array
    {
        return ['name'];
    }
}