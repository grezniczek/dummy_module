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

        if ($this->getSystemSetting("test-afterrender") == 1) {
            $this->initializeJavascriptModuleObject();
            $jsmo_name = $this->getJavascriptModuleObjectName();
    
            $js_url_langswitch = $this->getUrl("js/test_langswitch.js");
            print "<script type=\"text/javascript\" src=\"{$js_url_langswitch}\"></script>";
            print "<script>window.DE_RUB_DummyExternalModule.init({$jsmo_name});</script>";
        }

        if ($this->getSystemSetting("test-setsystemsetting") == 1) {
            $orig = $this->getSystemSetting("test");
            $this->setSystemSetting("test", $project_id == null ? "System value" : "Project {$project_id} value");
            $new = $this->getSystemSetting("test");
            ?>
            <script>
                alert('Set System Value Test: Original = "<?=json_encode($orig)?>", New = "<?=json_encode($new)?>".');
            </script>
            <?php
        }
    }
}
