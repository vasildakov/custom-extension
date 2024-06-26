<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;
use VasilDakov\SitePackage\Domain\Model\Product;
use VasilDakov\SitePackage\Domain\Repository\CategoryRepository;
use VasilDakov\SitePackage\Domain\Repository\ProductRepository;
use VasilDakov\SitePackage\Event\SimpleEvent;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class ProductController extends ActionController
{
    public function __construct(
        private readonly ProductRepository $products,
        private readonly CategoryRepository $categories,
    ) {}

    /**
     * @throws NoSuchArgumentException
     */
    public function indexAction(): ResponseInterface
    {
        $itemsPerPage = 4;

        $currentPageNumber = $this->request->hasArgument('page')
            ? (int)$this->request->getArgument('page')
            : 1;

        $selectedCategory = $this->request->hasArgument('category')
            ? $this->request->getArgument('category')
            : '';

        $products = $this->products->findAll();

        $paginator = new QueryResultPaginator($products, $currentPageNumber, $itemsPerPage);
        $pagination = new SimplePagination($paginator);

        //dd($products);

        $this->eventDispatcher->dispatch(
            new SimpleEvent('Product controller index method has been called')
        );

        $this->view->assignMultiple(
            [
                'results'          => $products->count(),
                'selectedCategory' => $selectedCategory,
                'categories'       => $this->categories->findAll(),
                'paginator'        => $paginator,
                'pagination'       => $pagination,
                'products'         => $this->products->findPaginated($itemsPerPage, $currentPageNumber),
            ]
        );

        return $this->htmlResponse();
    }

    public function showAction(Product $product): ResponseInterface
    {
        //DebugUtility::debug($product->getCategories(), 'categories');
        //DebugUtility::debug($product, 'product');

        $this->view->assign('product', $product);
        $this->view->assign('categories', $product->getCategories());

        return $this->htmlResponse();
    }

    public function searchAction(): ResponseInterface
    {
        // return $this->redirect('index');
        return $this->htmlResponse();
    }
}
