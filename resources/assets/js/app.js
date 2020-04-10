require('./bootstrap');

// Summernote
require('summernote/dist/summernote-bs4');

const datepicker = require('js-datepicker');

$(document).ready(function () {
  $('.summernote').summernote({
    height: 300,
    callbacks: {
      onImageUpload: function(files) {
        var editor = $(this);
        var url = editor.data('image-url');

        var data = new FormData();
        data.append('file', files[0]);

        axios.post(url, data)
          .then(function(response) {
            editor.summernote('insertImage', response.data);
          })
          .catch(function (error) {
            console.error(error);
          });
      }
    }
  });

    const picker = datepicker('#date-picker', {
        formatter: (input, date, instance) => {
            input.value = date.toLocaleDateString();
        }
    });
});
