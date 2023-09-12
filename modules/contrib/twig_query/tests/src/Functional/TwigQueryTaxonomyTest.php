<?php

namespace Drupal\Tests\twig_query\Functional;

use Drupal\taxonomy\Entity\Term;
use Symfony\Component\VarDumper\VarDumper;

/**
 * A test for the Twig extension.
 *
 * @group twig_query
 */
class TwigQueryTaxonomyTest extends TestBase
{
  /**
   * {@inheritdoc}
   */
  public static $modules = ['twig_query', 'twig_query_test', 'taxonomy', 'language'];

  protected function setUp()
  {
    parent::setUp();

    Term::create(['name' => 'Alpha', 'vid' => 'tags'])->save();
    Term::create(['name' => 'Beta', 'vid' => 'tags'])->save();
    Term::create(['name' => 'Gamma', 'vid' => 'tags'])->save();
    Term::create(['name' => 'Stargate', 'vid' => 'tags'])->save();
  }

  public function testAllGetFetched()
  {
    $this->drupalGet('<front>');
    $basePath = static::BASE_XPATH . '/div[@class = "terms-fetch-all"';

    $this->assertByXpath($basePath . ' and contains(text(), "Alpha")]');
    $this->assertByXpath($basePath . ' and contains(text(), "Beta")]');
    $this->assertByXpath($basePath . ' and contains(text(), "Gamma")]');
  }

  public function testGetFetchedByTitle()
  {
    $this->drupalGet('<front>');
    $basePath = static::BASE_XPATH . '/div[@class = "term-fetch-by-title"';
    $this->assertByXpath($basePath . ' and contains(text(), "Stargate") and not(contains(text(), "Alpha"))]');
  }

  public function testGetFetchedByTitleWithStringNotation()
  {
    $this->drupalGet('<front>');
    $basePath = static::BASE_XPATH . '/div[@class = "term-fetch-by-title-string-notation"';
    $this->assertByXpath($basePath . ' and contains(text(), "Stargate") and not(contains(text(), "Alpha"))]');
  }

  public function testOrderByAsc()
  {
    $this->drupalGet('<front>');
    $basePath = static::BASE_XPATH . '/div[@class = "term-order-by-asc"';
    $this->assertByXpath($basePath . ' and contains(text(), "AlphaBetaGammaStargate")]');
  }

  public function testOrderByDesc()
  {
    $this->drupalGet('<front>');
    $basePath = static::BASE_XPATH . '/div[@class = "term-order-by-desc"';
    $this->assertByXpath($basePath . ' and contains(text(), "StargateGammaBetaAlpha")]');
  }

  public function testLimit()
  {
    $this->drupalGet('<front>');

    $basePath = static::BASE_XPATH . '/div[@class = "term-limit"';
    $this->assertByXpath($basePath . ' and contains(text(), "--2--")]');
  }

  public function testGroupOr()
  {
    $this->drupalGet('<front>');

    $basePath = static::BASE_XPATH . '/div[@class = "term-group-or"';
    $this->assertByXpath($basePath . ' and contains(text(), "--2--")]');
  }

  public function testGroupAnd()
  {
    $this->drupalGet('<front>');

    $basePath = static::BASE_XPATH . '/div[@class = "term-group-and"';

    $this->assertByXpath($basePath . ' and contains(text(), "--1--")]');
  }

}
