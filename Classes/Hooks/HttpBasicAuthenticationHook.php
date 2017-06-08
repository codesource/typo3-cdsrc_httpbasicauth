<?php
/**
 * @copyright Copyright (c) 2016 Code-Source
 */
namespace CDSRC\CdsrcHttpbasicauth\Hooks;


use CDSRC\CdsrcHttpbasicauth\Domain\Model\Access;
use CDSRC\CdsrcHttpbasicauth\Domain\Repository\AccessRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

class HttpBasicAuthenticationHook
{
    /**
     * @var AccessRepository
     */
    protected $repository;

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var bool
     */
    protected $isCgi;

    /**
     * HttpBasicAuthenticationHook constructor.
     */
    public function __construct()
    {
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->repository = $this->objectManager->get(AccessRepository::class);
        $this->isCgi = strpos(strtolower(php_sapi_name()), 'cgi') !== false;
    }

    /**
     * Apply hook on frontend environment
     *
     * @param array $config
     */
    public function apply(array $config)
    {
        if (TYPO3_MODE === 'FE') {
            $typoScriptFrontendController = $config['pObj'];
            $pageIds = [];
            foreach ($typoScriptFrontendController->rootLine as $page) {
                $pageIds[] = $page['uid'];
            }
            $accesses = $this->repository->findByPids($pageIds);
            if (count($accesses) > 0) {
                $mesasge = '';
                /** @var Access $access */
                foreach ($accesses as $access) {
                    if ($this->isUserAuthenticated($access)) {
                        return;
                    }
                    $message = $access->getMessage();
                    if (!$access->isPropagationAllowed()) {
                        break;
                    }
                }
                $this->sendHttpBasicAuthencationHeaders($typoScriptFrontendController, $message);
            }
        }
    }

    /**
     * Check if user is authenticated
     *
     * @param \CDSRC\CdsrcHttpbasicauth\Domain\Model\Access $access
     *
     * @return bool
     * @throws \Exception
     */
    protected function isUserAuthenticated(Access $access)
    {
        if ($access->isAccessAllowedToEverybody()) {
            return true;
        }

        if ($this->isCgi) {
            if (!isset($_SERVER['HTTP_AUTHORIZATION']) && !isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
                throw new \Exception(
                    'CGI require a rewrite rule to works with this extension. see Resources/Private/README for more detail',
                    1473169459
                );
            }
            $httpAuthorization = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
            list($username, $password) = explode(':', base64_decode(substr($httpAuthorization, 6)));
            $password = $password ? md5($password) : '';
        } else {
            $username = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
            $password = isset($_SERVER['PHP_AUTH_PW']) ? md5($_SERVER['PHP_AUTH_PW']) : '';
        }

        if (!$username || $access->getUsername() !== $username) {
            return false;
        }

        if (!$password || $access->getPassword() !== $password) {
            return false;
        }

        return true;
    }

    /**
     * Send header for basic authentication
     *
     * @param \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController $controller
     * @param string $message
     */
    protected function sendHttpBasicAuthencationHeaders(TypoScriptFrontendController $controller, $message)
    {
        $realm = $controller->getDomainNameForPid($controller->id);

        header('WWW-Authenticate: Basic realm="' . $realm . '"');
        header('HTTP/1.0 401 Unauthorized');
        echo $message;
        exit;
    }
}