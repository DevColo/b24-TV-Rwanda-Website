<?php

namespace Drupal\twig_query\Twig;

use Drupal\twig_query\Repository\QueryRepository;
use Drupal\twig_query\Service\EntryService;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use Twig\TwigFunction;

class QueryExtension extends AbstractExtension implements GlobalsInterface
{

  /**
   * @var EntryService
   */
  private $entryService;


  /**
   * QueryExtension constructor.
   * @param EntryService $entryService
   */
  public function __construct(EntryService $entryService)
  {
    $this->entryService = $entryService;
  }

  public function getGlobals()
  {
    return [
      'query' => $this->getService()
    ];
  }

  public function getService()
  {
    return $this->entryService;
  }
}
