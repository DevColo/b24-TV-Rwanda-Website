<?php

namespace Drupal\twig_query\Repository;

class TaxonomyRepository extends QueryRepository
{
  public function defineEntityType(): string
  {
    return 'taxonomy_term';
  }
}
