require('./bootstrap');
require('./infinite-scroll');

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
