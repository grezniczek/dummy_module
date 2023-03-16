<?php

namespace DE\RUB\DummyExternalModule;

use ExternalModules\AbstractExternalModule;

/**
 * ExternalModule class for Patient Finder.
 */
class DummyExternalModule extends AbstractExternalModule {

    public function redcap_module_link_check_display($project_id, $link) {
        return $link;
    }

    public function redcap_every_page_top($project_id) {

        return;

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
            $key = "test";
            $orig = $this->getSystemSetting($key);
            $this->setSystemSetting($key, $project_id == null ? "System value" : "Project {$project_id} value");
            $new = $this->getSystemSetting($key);
            ?>
            <script>
                console.warn('Set System Value Test: Original = <?=json_encode($orig)?>, New = <?=json_encode($new)?>.');
            </script>
            <?php
        }

        if ($project_id != null && $this->getSystemSetting("test-setprojectsetting") == 1) {
            $key = "p-test";
            $orig = $this->getProjectSetting($key) ?? 0;
            $orig = is_numeric($orig) ? $orig * 1 : 0;
            $this->setProjectSetting($key, $orig + 1);
            $new = $this->getProjectSetting($key);
            ?>
            <script>
                console.warn('Set Project Value Test: Original = <?=json_encode($orig)?>, New = <?=json_encode($new)?>.');
            </script>
            <?php
        }

    }


    public function redcap_module_ajax($action, $payload, $project_id, $record, $instrument, $event_id, $repeat_instance, $survey_hash, $response_id, $survey_queue_hash, $page, $page_full, $user_id, $group_id) {

        return "It works! " . NOW;
    }
}
