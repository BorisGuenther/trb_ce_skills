<?php
namespace TRB\TrbCeSkills\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Boris Günther <info@boris-guenther.de>, Boris Günther
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package trb_ce_skills
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class SkillsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * Main Action
	 *
	 * @return void
	 */
	public function mainAction() {
		//Get record
		$data 	= $this->configurationManager->getContentObject()->data;

		//Get params
		$items		= explode("\n", $data['bodytext']);
		$default	= $data['tx_trb_basics_fontawesome_icon'];

		//Render list
		$result		= array();
		foreach($items as $item) {
			//Get specific icon
			if(strpos($item, "|") !== false) {
				list($icon, $text)	= explode("|", $item);
			} else {
				$icon	= $default;
				$text	= $item;
			}

			//Skip empty rows
			if(trim($text) == '') {
				continue;
			}

			//Setup result
			$result[]	= array(
				'icon'	=> $icon,
				'text'	=> $text,
			);
		}

		//Detach result
		$data['tx_trb_ce_skills']	= $result;

		//Assign data to view
		$this->view->assign('data', $data);
	}

}
