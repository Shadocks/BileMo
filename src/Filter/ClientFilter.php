<?php

namespace App\Filter;

use App\Annotation\ClientAnnotation;
use Doctrine\Common\Annotations\Reader;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

/**
 * Class ClientFilter.
 */
final class ClientFilter extends SQLFilter
{
    /**
     * @var Reader
     */
    private $reader;

    /**
     * @param ClassMetadata $targetEntity
     * @param string        $targetTableAlias
     *
     * @return string
     */
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias): string
    {
        if (null === $this->reader) {
            return new \RuntimeException(sprintf('An annotation reader must be provided. Be sure to call "%s::setAnnotationReader()".', __CLASS__));
        }

        $clientAnnotation = $this->reader->getClassAnnotation($targetEntity->getReflectionClass(), ClientAnnotation::class);

        if (!$clientAnnotation) {
            return'';
        }

        $fileName = $clientAnnotation->clientFieldName;

        try {
            $clientId = $this->getParameter('id');
        } catch (\InvalidArgumentException $e) {
            return '';
        }

        if (empty($fileName) || empty($clientId)) {
            return '';
        }

        return sprintf('%s.%s = %s', $targetTableAlias, $fileName, $clientId);
    }

    /**
     * @param Reader $reader
     */
    public function setAnnotationReader(Reader $reader): void
    {
        $this->reader = $reader;
    }
}
