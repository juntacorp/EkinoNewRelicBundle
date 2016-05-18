<?php

/*
 * This file is part of Ekino New Relic bundle.
 *
 * (c) Ekino - Thomas Rabaix <thomas.rabaix@ekino.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ekino\Bundle\NewRelicBundle\NewRelic;

interface NewRelicInteractorInterface
{
    /**
     * @param string $name
     *
     * @return void
     */
    function setApplicationName($name, $key = null, $xmit = false);

    /**
     * @param string $name
     *
     * @return void
     */
    function setTransactionName($name);

    /**
     * @return void
     */
    public function ignoreTransaction();

    /**
     * @param string $name
     * @param string $value
     *
     * @return void
     */
    function addCustomMetric($name, $value);

    /**
     * @param string $name
     * @param string $value
     *
     * @return void
     */
    function addCustomParameter($name, $value);

    /**
     * @return string
     */
    function getBrowserTimingHeader();

    /**
     * @return string
     */
    function getBrowserTimingFooter();

    /**
     * @return void
     */
    function disableAutoRUM();

    /**
     * @param string $msg
     *
     * @return void
     */
    function noticeError($msg);

    /**
     * @param Exception $exception
     *
     * @return void
     */
    function noticeException(\Exception $e);

    /**
     * @return void
     */
    function enableBackgroundJob();

    /**
     * @return void
     */
    function disableBackgroundJob();

    /**
     * If you previously ended a transaction you many want to start a new one.
     *
     * @param string $name app name
     *
     * @return void
     */
    public function startTransaction($name);

    /**
     * End a transaction now
     *
     * @return void
     */
    public function endTransaction();

    /**
     * Records a New Relic Insights custom event.
     *
     * For more information, see Inserting custom events with the PHP agent. The attributes parameter is expected to be an
     * associative array: the keys should be the attribute names (which may be up to 255 characters in length), and the
     * values should be scalar values: arrays and objects are not supported.
     *
     * This API call was introduced in version 4.18 of the agent.
     *
     * @link https://docs.newrelic.com/docs/agents/php-agent/configuration/php-agent-api#api-record-custom-event
     *
     * @param string $name
     * @param array $attributes
     *
     * @return void
     */
    public function recordCustomEvent($name, array $attributes);
}
