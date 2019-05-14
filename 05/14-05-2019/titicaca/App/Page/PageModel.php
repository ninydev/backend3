<?php
namespace App\Page;
use App\Config;

/**
 * 
 */
class PageModel
{
	
	public function getContentPageFromFile ($filename){
		// включаем буфер
		ob_start();
		include (Config::$pathToStorage . 'page/'. $filename); 

		// сохраняем всё что есть в буфере в переменную $content
		$content = ob_get_contents();
		
		// отключаем и очищаем буфер
		ob_end_clean();

		return $content;
	}

	function getPageByID ($id){
		switch ($id) {
			case '2':
				return $this->getContentPageFromFile ('1.php');
				break;

			case '3':
				return $this->getContentPageFromFile ('2.php');
				break;

            case 'cars':
                return $this->getContentPageFromFile ('cars.php');
                break;
				
			case 'warranty':
				return $this->getContentPageFromFile ('warranty.php');
				break;

			case 'service':
				return $this->getContentPageFromFile ('service.php');
				break;

			default:
			return " Нет данных "; // TODO Error 404 or HomePage
				break;
		}
	}


}