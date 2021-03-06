<?php

namespace Drupal\yaem_facebook_video\Plugin\Renderer;

use Drupal\yaem\Plugin\Renderer\RendererBase;

/**
 * {@inheritdoc}
 *
 * @YaemRenderer(
 *   id = "yaem_facebook_video",
 *   label = @Translation("Facebook Video"),
 *   weight = 20,
 * )
 */
class FacebookVideoRenderer extends RendererBase {

  protected static $urlPattern = [
    '@facebook\.com/([^/]+/videos/(.*[\D].*/)?|video\.php\?v\=)(?<id>[\d]+)/?@',
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
        'src' => sprintf('https://www.facebook.com/video/embed?video_id=%s', $matches['id']),
        'width' => '480',
        'height' => '480',
      ],
    ];
  }

}
