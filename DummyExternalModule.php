<?php

namespace DE\RUB\DummyExternalModule;

use ExternalModules\AbstractExternalModule;

/**
 * ExternalModule class for Patient Finder.
 */
class DummyExternalModule extends AbstractExternalModule {

    public function redcap_every_page_top($project_id) {

        // $js_url_survey = $this->getSurveyEndpointUrl("js/test_survey.js");
        // print "<script type=\"text/javascript\" src=\"{$js_url_survey}\"></script>";

        // $js_url_api = $this->getApiEndpointUrl("js/test_api.js");
        // print "<script type=\"text/javascript\" src=\"{$js_url_api}\"></script>";
        
        $js_url_langswitch = $this->getApiEndpointUrl("js/test_langswitch.js");
        print "<script type=\"text/javascript\" src=\"{$js_url_langswitch}\"></script>";

    }

}
