<?php

namespace Drupal\Tests\twig_query\Functional;


use Symfony\Component\VarDumper\VarDumper;

/**
 * A test for the Twig extension.
 *
 * @group twig_query
 */
class TwigQueryNodeTest extends TestBase
{

  /**
   * {@inheritdoc}
   */
  public static $modules = ['twig_query', 'twig_query_test', 'node', 'language'];

  /**
   * {@inheritdoc}
   */
  public function setUp()
  {
    parent::setUp();

    $this->createNode(['title' => 'Alpha', 'type' => 'project']);
    $this->createNode(['title' => 'Beta', 'type' => 'project']);
    $this->createNode(['title' => 'Gamma', 'type' => 'project']);
    $this->createNode(['title' => 'Stargate', 'type' => 'project']);

  }

  public function testAllGetFetched()
  {
    $this->drupalGet('<front>');
    $basePath = static::BASE_XPATH . '/div[@class = "node-fetch-all"';

    VarDumper::dump($this->getTextContent());

    $this->assertByXpath($basePath . ' and contains(text(), "Alpha")]');
    $this->assertByXpath($basePath . ' and contains(text(), "Beta")]');
    $this->assertByXpath($basePath . ' and contains(text(), "Gamma")]');
  }

  public function testGetFetchedByTitle()
  {
    $this->drupalGet('<front>');
    $basePath = static::BASE_XPATH . '/div[@class = "node-fetch-by-title"';
    $this->assertByXpath($basePath . ' and contains(text(), "Stargate") and not(contains(text(), "Alpha"))]');
  }

  public function testGetFetchedByTitleWithStringNotation()
  {
    $this->drupalGet('<front>');
    $basePath = static::BASE_XPATH . '/div[@class = "node-fetch-by-title-string-notation"';
    $this->assertByXpath($basePath . ' and contains(text(), "Stargate") and not(contains(text(), "Alpha"))]');
  }

  public function testOrderByAsc()
  {
    $this->drupalGet('<front>');
    $basePath = static::BASE_XPATH . '/div[@class = "node-order-by-asc"';
    $this->assertByXpath($basePath . ' and contains(text(), "AlphaBetaGammaStargate")]');
  }

  public function testOrderByDesc()
  {
    $this->drupalGet('<front>');
    $basePath = static::BASE_XPATH . '/div[@class = "node-order-by-desc"';
    $this->assertByXpath($basePath . ' and contains(text(), "StargateGammaBetaAlpha")]');
  }

  public function testLimit()
  {
    $this->drupalGet('<front>');

    $basePath = static::BASE_XPATH . '/div[@class = "node-limit"';
    $this->assertByXpath($basePath . ' and contains(text(), "--2--")]');
  }

  public function testGroupOr()
  {
    $this->drupalGet('<front>');

    $basePath = static::BASE_XPATH . '/div[@class = "node-group-or"';
    $this->assertByXpath($basePath . ' and contains(text(), "--2--")]');
  }

  public function testGroupAnd()
  {
    $this->drupalGet('<front>');
VarDumper::dump($this->getTextContent());
    $basePath = static::BASE_XPATH . '/div[@class = "node-group-and"';
    $this->assertByXpath($basePath . ' and contains(text(), "--1--")]');
  }

}
