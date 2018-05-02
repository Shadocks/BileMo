<?php

namespace App\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * Class ClientAnnotation.
 *
 * @Annotation\Target("CLASS")
 */
final class ClientAnnotation
{
    /**
     * @var string
     */
    public $clientFieldName;
}
