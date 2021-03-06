<?php

namespace Drupal\yaem\Service;

use Drupal\Core\Config\ConfigFactory;
use Drupal\yaem\Plugin\Renderer\RendererInterface;
use Embed\DataInterface;

/**
 * A service class for handling URL embeds.
 */
interface EmbedServiceInterface {

  /**
   * EmbedServiceInterface constructor.
   *
   * @param ConfigFactory $config_factory
   *   The config factory.
   * @param RendererPluginManagerInterface $rendererManager
   *   Overrides the configuration from the embed settings.
   */
  public function __construct(ConfigFactory $config_factory, RendererPluginManagerInterface $rendererManager);

  /**
   * Gets the configuration which will be applied when fetching the embed.
   *
   * @return array
   *   The configuration.
   */
  public function getConfig();

  /**
   * Sets the configuration which will be applied when fetching the embed.
   *
   * @param array $config
   *   The configruation.
   */
  public function setConfig(array $config);

  /**
   * Gets an embed data interface.
   *
   * @param string $url
   *   The url.
   *
   * @return NULL|DataInterface
   *   The interface.
   */
  public function getEmbed($url);

  /**
   * Gets the renderer plugin for the url.
   *
   * @param string $url
   *   The url.
   *
   * @return RendererInterface
   *   The renderer.
   */
  public function getRenderer($url);

  /**
   * Renders a given url.
   *
   * @param string $url
   *   A url.
   *
   * @return array
   *   A drupal render array.
   */
  public function renderUrl($url);

}
