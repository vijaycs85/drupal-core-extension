# Behat Drupal Core Extension

Provides behat tests for Drupal 8 core modules, themes and profiles. Uses [Drupal extension](https://github.com/jhedstrom/drupalextension)
components for most of the scenarios.

## Coverage
Currently provides scenarios for Contact module.

## Run tests

1. copy behat.yml.dist to behat.yml
2. Make necessary changes to behat.yml to reflect Drupal installation
3. Run
   ```bash
   php vendor/bin/behat -c path/to/behat.yml -s contact
   ```
