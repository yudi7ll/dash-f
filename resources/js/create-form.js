const jQuery = require('jquery');
const SimpleMDE = require('simplemde');
require('selectize');

jQuery('#tags-input').selectize({
    delimiter: ',',
    persist: false,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    }
});

new SimpleMDE({ element: document.getElementById("body") });
