<?php

use \mageekguy\atoum;

$report = $script->addDefaultReport();

$coverageField = new atoum\report\fields\runner\coverage\html('Kong', 'coverage');
$coverageField->setRootUrl('http://test.local');
$report->addField($coverageField);
