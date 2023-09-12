<?php

namespace Drupal\twig_query\Service;


class TaxonomyService extends Base
{
  public function defineTypeColumn(): string
  {
    return 'vid';
  }
}
