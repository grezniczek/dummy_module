<?php
    $module->initializeJavascriptModuleObject();
    $jsmo = $module->getJavascriptModuleObjectName();
?>
<h1>Ajax Tests</h1>
<button id="ajax-test-btn" type="button" class="btn btn-success">Make Request</button>
<br>
<br>
<pre id="result">

</pre>
<script>
    const module = <?=$jsmo?>;
    $('#ajax-test-btn').on('click', function() {
        console.log('Initiating AJAX request');
        module.ajax('ajax-test', null)
        .then(function(response) {
            $('#result').text(response).removeClass("red");
        })
        .catch(function(err) {
            $('#result').text(err).addClass("red");

        });
    });
</script>

