<?php

namespace App\Http\Controllers;

function CountWords($source, $source_extension)
{
	//add supported formarts to array
	$supported_extensions = array('docx','doc');

	if (in_array($source_extension, $supported_extensions)){
		//\PhpOffice\PhpWord\Settings::setZipClass(\PhpOffice\PhpWord\Settings::PCLZIP);
		\PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
		$phpword = \PhpOffice\PhpWord\IOFactory::load($source);
		$phpword->getSettings()->setHideGrammaticalErrors(true);
		$phpword->getSettings()->setHideSpellingErrors(true);
		$sections = $phpword->getSections();
		$uploadedText = '';

		foreach ($sections as $section) {
		    $elements = $section->getElements();
		    foreach ($elements as $element) {
			if (get_class($element) === 'PhpOffice\PhpWord\Element\Text') {
			    $uploadedText .= $element->getText();
			    $uploadedText .= ' ';
			} else if (get_class($element) === 'PhpOffice\PhpWord\Element\TextRun') {
			    $textRunElements = $element->getElements();
			    foreach ($textRunElements as $textRunElement) {
				$uploadedText .= $textRunElement->getText();
				$uploadedText .= ' ';
			    }
			} else if (get_class($element) === 'PhpOffice\PhpWord\Element\TextBreak') {
			    $uploadedText .= ' ';
			} else {
			    throw new Exception('Unknown class type ' . get_class($e));
			}
		    }
		}

		$uploadedText = str_replace('&nbsp;',"", $uploadedText);
		$uploadedText = str_replace('•',"",$uploadedText);
		$uploadedText = preg_split('/\s+/', $uploadedText);
		$numberWords = count($uploadedText);
		return $numberWords;
	}
	else if (!in_array($source_extension, $supported_extensions)) {

        $file_content = file_get_contents($source);
        $contents = str_word_count(strtolower($file_content));
	    return $contents;
	}
	else{
		return false;
	}
}

