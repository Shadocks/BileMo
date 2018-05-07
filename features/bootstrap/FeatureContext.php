<?php

use App\Entity\Client;
use Behat\Behat\Context\Context;
use Behatch\Context\RestContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * This context class contains the definitions of the steps used by the demo
 * feature file. Learn how to get started with Behat and BDD on Behat's website.
 *
 * @see http://behat.org/en/latest/quick_start.html
 */
class FeatureContext implements Context
{
    /**
     * @var KernelInterface
     */
    private $kernel;

    /**
     * @var JWTManager
     */
    private $JWTManager;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var RestContext
     */
    private $restContext;

    /**
     * @var Response|null
     */
    private $response;

    /**
     * FeatureContext constructor.
     *
     * @param KernelInterface        $kernel
     * @param JWTManager             $JWTManager
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        KernelInterface $kernel,
        JWTManager $JWTManager,
        EntityManagerInterface $entityManager
    ) {
        $this->kernel = $kernel;
        $this->JWTManager = $JWTManager;
        $this->entityManager = $entityManager;
    }

    /**
     * @When a demo scenario sends a request to :path
     */
    public function aDemoScenarioSendsARequestTo(string $path)
    {
        $this->response = $this->kernel->handle(Request::create($path, 'GET'));
    }

    /**
     * @Then the response should be received
     */
    public function theResponseShouldBeReceived()
    {
        if (null === $this->response) {
            throw new \RuntimeException('No response received');
        }
    }

    /**
     * @BeforeScenario product
     * @login
     *
     * @param BeforeScenarioScope $scope
     */
    public function login(BeforeScenarioScope $scope)
    {
        $client = $this->entityManager->getRepository(Client::class)
                                      ->find('54c45693-837b-456c-89a0-8b00552e1b9c');

        $token = $this->JWTManager->create($client);

        $this->restContext = $scope->getEnvironment()->getContext(RestContext::class);
        $this->restContext->iAddHeaderEqualTo('Authorization', "Bearer $token");
    }
}
