<?php
// api/src/Resolvers/CreateMediaObjectResolver.php

namespace App\Resolvers;

use ApiPlatform\Core\GraphQl\Resolver\MutationResolverInterface;
use App\Entity\MediaObject;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class CreateMediaObjectResolver implements MutationResolverInterface
{
    /**
     * @param null $item
     */
    public function __invoke($item, array $context): MediaObject
    {
        $uploadedFile = $context['args']['input']['file'];

        $mediaObject = new MediaObject();
        $mediaObject->file = $uploadedFile;

        return $mediaObject;
    }
}

