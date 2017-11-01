<?php

namespace DrupalCoreExtension\Context;

use Drupal\DrupalExtension\Context\RawDrupalContext;

/**
 * Provides pre-built step definitions for interacting with Drupal.
 */
class DrupalContext extends RawDrupalContext {

  /**
   * Checks that field with with the given name or ID exist.
   *
   * Example: Then I should see "body" field
   * Example: And I should see "body" field
   *
   * @Then /^(?:|I )should see "(?P<field>[^"]*)" field$/
   */
  public function assertFieldOnPage($field)
  {
    $this->assertSession()->fieldExists($field);
  }

  /**
   * Checks that field with the given name or ID does exist.
   *
   * Example: Then I should not see "body" field
   * Example: And I should see not "body" field
   *
   * @Then /^(?:|I )should not see "(?P<field>[^"]*)" field$/
   */
  public function assertNoFieldOnPage($field)
  {
    $this->assertSession()->fieldNotExists($field);
  }

  /**
   * Checks that button with with the given name or ID exist.
   *
   * Example: Then I should see "submit" button
   * Example: And I should see "body" button
   *
   * @Then /^(?:|I )should see "(?P<button>[^"]*)" button$/
   */
  public function assertButtonExist($button)
  {
    $this->assertSession()->buttonExists($button);
  }

  /**
   * Checks that button with the given name or ID does exist.
   *
   * Example: Then I should not see "body" button
   * Example: And I should see not "body" button
   *
   * @Then /^(?:|I )should not see "(?P<button>[^"]*)" button$/
   */
  public function assertButtonNotExist($button)
  {
    $this->assertSession()->buttonNotExists($button);
  }

  /**
   * Performs an xpath search on the contents of the internal browser.
   *
   * The search is relative to the root element (HTML tag normally) of the page.
   *
   * @param string $xpath
   *   The xpath string to use in the search.
   * @param array $arguments
   *   An array of arguments with keys in the form ':name' matching the
   *   placeholders in the query. The values may be either strings or numeric
   *   values.
   *
   * @return \Behat\Mink\Element\NodeElement[]
   *   The list of elements matching the xpath expression.
   */
  protected function xpath($xpath, array $arguments = []) {
    $xpath = $this->assertSession()->buildXPathQuery($xpath, $arguments);
    return $this->getSession()->getPage()->findAll('xpath', $xpath);
  }

  /**
   * Returns WebAssert object.
   *
   * @param string $name
   *   (optional) Name of the session. Defaults to the active session.
   *
   * @return \Drupal\Tests\WebAssert
   *   A new web-assert option for asserting the presence of elements with.
   */
  public function assertSession($name = NULL) {
    return new WebAssert($this->getSession($name), $this->getMinkParameter('base_url'));
  }

}