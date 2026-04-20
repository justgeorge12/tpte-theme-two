<?php

$finder = PhpCsFixer\Finder::create()
                           ->in(__DIR__)
                           ->exclude(['vendor', 'node_modules', 'wp-content/uploads']);

return (new PhpCsFixer\Config())
	->setRules([
		'@PSR12' => true,
		'array_syntax' => ['syntax' => 'short'],
		'binary_operator_spaces' => ['default' => 'align_single_space_minimal'],
		'no_unused_imports' => true,
		'single_quote' => true,
	])
	->setFinder($finder);