<?php
/**
 * Created by PhpStorm.
 * User: ashterix
 * Date: 30.04.17
 * Time: 9:04
 */

namespace Ufo\JsonRpcBundle\Security;


use Ufo\JsonRpcBundle\Exceptions\RpcInvalidTokenException;
use Ufo\JsonRpcBundle\Security\Interfaces\ITokenValidator;

class SimpleTokenValidator implements ITokenValidator
{

    /**
     * SimpleTokenValidator constructor.
     * @param array $clientsTokens
     */
    public function __construct(protected array $clientsTokens = [])
    {
    }

    /**
     * @param string $token
     * @return bool
     * @throws RpcInvalidTokenException
     */
    public function isValid(string $token): bool
    {
        if (false === in_array($token, $this->clientsTokens)) {
            throw new RpcInvalidTokenException();
        }
        return true;
    }

    /**
     * @return array
     */
    public function getClientsTokens(): array
    {
        return $this->clientsTokens;
    }

}