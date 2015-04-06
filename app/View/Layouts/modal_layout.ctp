<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
//$cakeDescription = __d('cake_dev', 'Digimetrik');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<?php

echo $this->Html->meta('icon');
echo $this->fetch('meta');
echo $this->Html->css('bootstrap.css');
echo $this->Html->css('style.css');
echo $this->Html->css('responsive.css');
echo $this->Html->css('stylelistu.css');



echo $this->fetch('custom-form-elements');
echo $this->fetch('content');
?>


