import $ from 'jquery';
import 'selectize';
import SimpleMDE from 'simplemde';


$('#tags-input').selectize({
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
