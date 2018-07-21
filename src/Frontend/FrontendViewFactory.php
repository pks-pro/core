<?php

/*
 * This file is part of Flarum.
 *
 * (c) Toby Zerner <toby.zerner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flarum\Frontend;

use Flarum\Api\Client;
use Flarum\Api\Serializer\CurrentUserSerializer;
use Flarum\Foundation\Application;
use Flarum\Locale\LocaleManager;
use Illuminate\Contracts\View\Factory;

class FrontendViewFactory
{
    /**
     * @var Client
     */
    protected $api;

    /**
     * @var Factory
     */
    protected $view;

    /**
     * @var LocaleManager
     */
    protected $locales;

    /**
     * @var CurrentUserSerializer
     */
    protected $userSerializer;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Client $api
     * @param Factory $view
     * @param LocaleManager $locales
     * @param CurrentUserSerializer $userSerializer
     * @param Application $app
     */
    public function __construct(Client $api, Factory $view, LocaleManager $locales, CurrentUserSerializer $userSerializer, Application $app)
    {
        $this->api = $api;
        $this->view = $view;
        $this->locales = $locales;
        $this->userSerializer = $userSerializer;
        $this->app = $app;
    }

    /**
     * @param string $layout
     * @param FrontendAssets $assets
     * @return FrontendView
     */
    public function make($layout, FrontendAssets $assets)
    {
        return new FrontendView($layout, $assets, $this->api, $this->view, $this->locales, $this->userSerializer, $this->app);
    }
}