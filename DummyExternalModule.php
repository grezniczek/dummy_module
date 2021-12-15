<?php

namespace DE\RUB\DummyExternalModule;

use ExternalModules\AbstractExternalModule;

/**
 * ExternalModule class for Patient Finder.
 */
class DummyExternalModule extends AbstractExternalModule {

    public function redcap_every_page_top($project_id) {

        $jsUrl1 = $this->getSurveyEndpointUrl("js/test1.js");
        print "<script type=\"text/javascript\" src=\"{$jsUrl1}\"></script>";

        $jsUrl2 = $this->getApiEndpointUrl("js/test2.js");
        print "<script type=\"text/javascript\" src=\"{$jsUrl2}\"></script>";
    }

}
