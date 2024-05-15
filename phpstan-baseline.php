<?php declare(strict_types = 1);

$ignoreErrors = [];
$ignoreErrors[] = [
	// identifier: missingType.return
	'message' => '#^Method VasilDakov\\\\SitePackage\\\\Command\\\\DoSomethingCommand\\:\\:do\\(\\) has no return type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/Classes/Command/DoSomethingCommand.php',
];
$ignoreErrors[] = [
	// identifier: method.nonObject
	'message' => '#^Cannot call method count\\(\\) on array\\|TYPO3\\\\CMS\\\\Extbase\\\\Persistence\\\\QueryResultInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/Classes/Controller/ProductController.php',
];
$ignoreErrors[] = [
	// identifier: argument.type
	'message' => '#^Parameter \\#1 \\$queryResult of class TYPO3\\\\CMS\\\\Extbase\\\\Pagination\\\\QueryResultPaginator constructor expects TYPO3\\\\CMS\\\\Extbase\\\\Persistence\\\\QueryResultInterface, array\\|TYPO3\\\\CMS\\\\Extbase\\\\Persistence\\\\QueryResultInterface given\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/Classes/Controller/ProductController.php',
];
$ignoreErrors[] = [
	// identifier: missingType.generics
	'message' => '#^Method VasilDakov\\\\SitePackage\\\\Domain\\\\Model\\\\Category\\:\\:getProducts\\(\\) return type with generic class TYPO3\\\\CMS\\\\Extbase\\\\Persistence\\\\ObjectStorage does not specify its types\\: TEntity$#',
	'count' => 1,
	'path' => __DIR__ . '/Classes/Domain/Model/Category.php',
];
$ignoreErrors[] = [
	// identifier: missingType.generics
	'message' => '#^Method VasilDakov\\\\SitePackage\\\\Domain\\\\Model\\\\Category\\:\\:setProducts\\(\\) has parameter \\$products with generic class TYPO3\\\\CMS\\\\Extbase\\\\Persistence\\\\ObjectStorage but does not specify its types\\: TEntity$#',
	'count' => 1,
	'path' => __DIR__ . '/Classes/Domain/Model/Category.php',
];
$ignoreErrors[] = [
	// identifier: property.unused
	'message' => '#^Property VasilDakov\\\\SitePackage\\\\Domain\\\\Model\\\\Price\\:\\:\\$amount is unused\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/Classes/Domain/Model/Price.php',
];
$ignoreErrors[] = [
	// identifier: missingType.generics
	'message' => '#^Method VasilDakov\\\\SitePackage\\\\Domain\\\\Model\\\\Product\\:\\:getCategories\\(\\) return type with generic class TYPO3\\\\CMS\\\\Extbase\\\\Persistence\\\\ObjectStorage does not specify its types\\: TEntity$#',
	'count' => 1,
	'path' => __DIR__ . '/Classes/Domain/Model/Product.php',
];
$ignoreErrors[] = [
	// identifier: missingType.generics
	'message' => '#^Method VasilDakov\\\\SitePackage\\\\Domain\\\\Model\\\\Product\\:\\:setCategories\\(\\) has parameter \\$categories with generic class TYPO3\\\\CMS\\\\Extbase\\\\Persistence\\\\ObjectStorage but does not specify its types\\: TEntity$#',
	'count' => 1,
	'path' => __DIR__ . '/Classes/Domain/Model/Product.php',
];
$ignoreErrors[] = [
	// identifier: property.onlyWritten
	'message' => '#^Property VasilDakov\\\\SitePackage\\\\ViewHelper\\\\GravatarViewHelper\\:\\:\\$repository is never read, only written\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/Classes/ViewHelper/GravatarViewHelper.php',
];

return ['parameters' => ['ignoreErrors' => $ignoreErrors]];
