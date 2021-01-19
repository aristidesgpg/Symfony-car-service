<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Mailer;

use Symfony\Component\Mailer\Exception\UnsupportedSchemeException;
use Symfony\Component\Mailer\Transport\AbstractTransportFactory;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\TransportInterface;

/**
 *  Used sendgrid-mailer as template
 */
final class ISRETransportFactory extends AbstractTransportFactory
{
    public function create(Dsn $dsn): TransportInterface
    {
        $scheme = $dsn->getScheme();
        $key = $this->getUser($dsn);

        if ('isre' === $scheme) {
            $host = 'default' === $dsn->getHost() ? null : $dsn->getHost();
            $port = $dsn->getPort();

            return (new ISREApiTransport($key, $this->client, $this->dispatcher, $this->logger))->setHost($host)->setPort($port);
        }

        throw new UnsupportedSchemeException($dsn, 'isre', $this->getSupportedSchemes());
    }

    protected function getSupportedSchemes(): array
    {
        return ['isre'];
    }
}
