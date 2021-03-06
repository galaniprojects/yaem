<?php

namespace Drupal\yaem_youtube\Plugin\Renderer;

use Drupal\yaem\Plugin\Renderer\RendererBase;

/**
 * {@inheritdoc}
 *
 * @YaemRenderer(
 *   id = "yaem_youtube",
 *   label = @Translation("Youtube"),
 *   weight = 10,
 * )
 */
class YoutubeRenderer extends RendererBase {

  protected static $urlPattern = [
    '@youtube\.com/(watch)?\?v=(?<id>[^\&\?/]+)@',
    '@youtube\.com/(embed|v)/(?<id>[^\&\?/]+)@',
    '@youtu\.be/(?<id>[^\&\?/]+)@',
  ];

  /**
   * {@inheritdoc}
   */
  public function render($url) {
    $matches = self::getFirstMatch($url);

    return [
      '#type' => 'html_tag',
      '#tag' => 'iframe',
      '#attributes' => [
        'frameborder' => '0',
        'allowfullscreen' => 'allowfullscreen',
        'src' => sprintf('https://www.youtube.com/embed/%s', $matches['id']),
        'width' => '480',
        'height' => '270',
      ],
    ];
  }

}
