
// initialize the texteditor
tinymce.init({
  selector: '#instructions',
  plugins: 'paste',
  menubar: false,
  toolbar: false,
  paste_as_text: true,
});

tinymce.init({
  selector: '#ingredients',
  plugins: 'paste',
  menubar: false,
  toolbar: false,
  paste_as_text: true,
});
