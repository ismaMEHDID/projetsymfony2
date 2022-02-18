<?php

namespace App\EventSubscriber;

use App\Entity\Categorie;
use App\Entity\Photo;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setCreatedAt'],
            BeforeEntityUpdatedEvent::class => ['setUpdatedAt']
        ];
    }

    public function setCreatedAt(BeforeEntityPersistedEvent $event)
    {
        $entityInstance = $event->getEntityInstance();

        if (!$entityInstance instanceof Photo && !$entityInstance instanceof Categorie) return;

        $entityInstance->setCreatedAt(new \DateTimeImmutable);
    }

    public function setUpdatedAt(BeforeEntityUpdatedEvent $event)
    {
        $entityInstance = $event->getEntityInstance();

        if (!$entityInstance instanceof Photo && !$entityInstance instanceof Categorie) return;

        $entityInstance->setUpdatedAt(new \DateTimeImmutable);
    }
}


//JUSTE POUR TEST (pas implémenté)