import jQuery from 'jquery';
import SimpleMDE from 'simplemde';
import 'selectize';

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
