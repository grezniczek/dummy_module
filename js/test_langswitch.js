
// @ts-check
;(function() {
    // @ts-ignore
    if (typeof window.DE_RUB_DummyExternalModule == 'undefined') {
        // @ts-ignore
        window.DE_RUB_DummyExternalModule = {
            init: initialize
        }
    }
    var JSMO = null

    function initialize(jsmo) {
        JSMO = jsmo
        console.log('Lang switch detector initilaized.', JSMO)
        JSMO.afterRender(notifyRendered)
    }
    function notifyRendered() {
        console.log('Page has been rendered.')
    }
})();

