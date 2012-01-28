<?php
class Controller {

    public $originalUrl, $sceneId, $thingId, $params, $tmpl;

    function __construct() {
        // URL that tag was linked to
        $this->originalUrl = $_GET['tlOrigUrl'];

        // Scene id. Unique id identifying an image with tags.
        $this->sceneId = $_GET['tlScene'];

        // Thing id. Unique id identifying a tag inside a scene.
        $this->thingId = $_GET['tlThing'];

        $this->params = self::getParams();

        $this->vars = array();

        $this->renderPage();
    }

    public static function getParams() {
        $params = array();
        foreach ($_GET as $key => $value) {
            $params[$key] = filter_var($value, FILTER_SANITIZE_STRING);
        }
        return $params;
    }

    public function show($vars = null, $template = 'std-template.php') {
        $vars == null ? $vars = $this->vars : $vars;
        extract($vars);
        require 'tmpl/' . $template;
    }
}
?>