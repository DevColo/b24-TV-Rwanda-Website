<?php

namespace Drupal\twig_query\Service;


class EntryService
{

  private NodeService $nodeService;
  private TaxonomyService $taxonomyService;

  public function __construct(NodeService $nodeService, TaxonomyService $taxonomyService)
  {
    $this->nodeService = $nodeService;
    $this->taxonomyService = $taxonomyService;
  }

  public function getEntries(): ServiceInterface
  {
    return $this->nodeService;
  }

  public function getTaxonomy(): ServiceInterface
  {
    return $this->taxonomyService;
  }

}
