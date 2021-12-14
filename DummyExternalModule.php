<?php

namespace DE\RUB\DummyExternalModule;

use ExternalModules\AbstractExternalModule;

/**
 * ExternalModule class for Patient Finder.
 */
class DummyExternalModule extends AbstractExternalModule {

    public function redcap_every_page_top($project_id) {

        $jsUrl = $this->getUrl("js/test.js");

        print "<script type=\"text/javascript\" src=\"{$jsUrl}\"></script>";
        
    }

}
