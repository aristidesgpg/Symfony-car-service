<?php

namespace App\Service;

use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class Pagination.
 *
 * @package App\Service
 */
class Pagination
{
    /**
     * @var PaginationInterface
     */
    private $pager;

    /**
     * @var int
     */
    public $pageLimit;

    /**
     * @var int
     */
    public $totalResults;

    /**
     * @var false|float
     */
    public $totalPages;

    /**
     * @var int
     */
    public $currentPage;

    /**
     * @var int
     */
    public $nextPage;

    /**
     * @var int
     */
    public $previousPage;

    /**
     * @var string
     */
    public $nextPageURL;

    /**
     * @var string
     */
    public $previousPageURL;

    /**
     * @var UrlGeneratorInterface
     */
    public $urlGenerator;

    /**
     * Pagination constructor.
     *
     * @param PaginationInterface $pager
     * @param int $pageLimit
     * @param UrlGeneratorInterface|null $urlGenerator <p>Pass if you are going to be building page URLs</p>
     */
    public function __construct(PaginationInterface $pager, int $pageLimit, UrlGeneratorInterface $urlGenerator = null)
    {
        $this->pager = $pager;
        $this->pageLimit = $pageLimit;
        $this->totalResults = $pager->getTotalItemCount();
        $this->totalPages = $this->totalResults / $this->pageLimit;
        $this->totalPages = ceil($this->totalPages);
        $this->currentPage = $pager->getCurrentPageNumber();
        $this->previousPage = $this->currentPage - 1;
        $this->nextPage = $this->currentPage + 1;
        $this->urlGenerator = $urlGenerator;

        if ($this->previousPage <= 0) {
            $this->previousPage = null;
        }

        if ($this->nextPage > $this->totalPages) {
            $this->nextPage = null;
        }
    }

    public function setURLGenerator(UrlGeneratorInterface $urlGenerator): void
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param string $route
     * @param array $parameters
     *
     * @return string|null
     */
    public function getNextPageURL(string $route, $parameters = [])
    {
        if (!$this->nextPage || !$this->urlGenerator) {
            return null;
        }

        $parameters['page'] = $this->nextPage;

        return $this->urlGenerator->generate($route, $parameters);
    }

    /**
     * @param string $route
     * @param array $parameters
     *
     * @return string|null
     */
    public function getPreviousPageURL(string $route, $parameters = [])
    {
        if (!$this->previousPage || !$this->urlGenerator) {
            return null;
        }

        $parameters['page'] = $this->previousPage;

        return $this->urlGenerator->generate($route, $parameters);
    }

    /**
     * Gets any page requested. Not sure if we'll need this.
     *
     * @param string $route
     * @param int $page
     * @param array $parameters
     *
     * @return string|null
     */
    public function getPageURL(string $route, int $page, $parameters = [])
    {
        if ($page <= 0 || $page > $this->totalPages || !$this->urlGenerator) {
            return null;
        }

        $parameters['page'] = $page;

        return $this->urlGenerator->generate($route, $parameters);
    }
}
