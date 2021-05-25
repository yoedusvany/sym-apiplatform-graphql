<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 24/05/2021
 * Time: 06:14
 */

namespace App\Service\Security;


use Lexik\Bundle\JWTAuthenticationBundle\Exception\ExpiredTokenException;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class TokenAuthenticator extends JWTTokenAuthenticator
{
    public function getUser($preAuthToken, UserProviderInterface $userProvider)
    {
        /** @var User $user */
        $user = parent::getUser($preAuthToken, $userProvider);
        $date = new \DateTime("now");
        if ($preAuthToken->getPayload()['exp'] < $date->getTimestamp()
        ) {
            throw new ExpiredTokenException();
        }

        return $user;
    }
}