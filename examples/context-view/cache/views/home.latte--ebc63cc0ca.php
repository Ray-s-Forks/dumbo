<?php

use Latte\Runtime as LR;

/** source: home.latte */
final class Template_ebc63cc0ca extends Latte\Runtime\Template
{
	public const Source = 'home.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!DOCTYPE html>
<html>
    <head>
        <title>Dumbo</title>
    </head>
    <body>
        <h1>';
		echo LR\Filters::escapeHtmlText($message) /* line 7 */;
		echo '</h1>
    </body>
</html>
';
	}
}
