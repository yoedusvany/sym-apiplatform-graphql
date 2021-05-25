<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 24/05/2021
 * Time: 06:10
 */

namespace App\Service\Security;


use App\Entity\Security\User;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserEnabledChecker implements UserCheckerInterface
{

    /**
     * Checks the user account before authentication.
     *
     * @throws AccountStatusException
     */
    public function checkPreAuth(UserInterface $user)
    {
        if(!$user instanceof User)
            return;

        if(!$user->getEnabled()){
            $error = "La cuenta esta desabilitada";
            throw new CustomUserMessageAuthenticationException($error,[],401);
        }
    }

    /**
     * Checks the user account after authentication.
     *
     * @throws AccountStatusException
     */
    public function checkPostAuth(UserInterface $user)
    {
        // TODO: Implement checkPostAuth() method.
    }
}