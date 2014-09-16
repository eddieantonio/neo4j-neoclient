<?php

/**
 * This file is part of the "-[:NEOXYGEN]->" NeoClient package
 *
 * (c) Neoxygen.io <http://neoxygen.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Neoxygen\NeoClient\Command\Core;

use Neoxygen\NeoClient\Command\AbstractCommand;
use Neoxygen\NeoClient\Request\Request;

class CoreGetVersionCommand extends AbstractCommand
{
    public function execute()
    {
        $request = $this->createRequest();
        $request->setMethod('GET');
        $request->setUrl($this->getPath());

        $endpoints = json_decode($this->httpClient->sendRequest($request), true);

        return $endpoints['neo4j_version'];
    }

    public function getPath()
    {
        return $this->getBaseUrl() .'/db/data';
    }
}
