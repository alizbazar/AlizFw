<?php
require_once 'app/PageRenderer.interface.php';
require_once 'app/Controller.class.php';

class StdPage extends Controller implements PageRenderer {

    function renderPage() {
        $this->vars['title'] = 'Example page';
        $this->vars['name'] = 'John';
    }
}

?>