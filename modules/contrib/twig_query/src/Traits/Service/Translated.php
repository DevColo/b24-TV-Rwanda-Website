<?php

namespace Drupal\twig_query\Traits\Service;

use Drupal\node\Entity\Node;

trait Translated
{
  protected function fetchTranslatedContent($nodes): array
  {
    $results = [];

    /**
     * @var $node Node
     */
    foreach ($nodes as $node) {
      if (!empty($node) && $node->hasTranslation($this->queryRepository->getLangCode())) {
        $results[] = $node->getTranslation($this->queryRepository->getLangCode());
      }
    }

    return $results;
  }
}
