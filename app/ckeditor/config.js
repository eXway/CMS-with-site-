/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {

  config.removePlugins = 'sourcedialog';
  config.removePlugins = 'sourcearea';

  config.filebrowserBrowseUrl = '../app/fileman/index.html';
  config.filebrowserImageBrowseUrl = '../app/fileman/index.html';
  config.filebrowserFlashBrowseUrl = null; //'http://expl4ined.eu/app/kcfinder/browse.php?opener=ckeditor&type=files';
  config.filebrowserUploadUrl = null; //'http://expl4ined.eu/app/kcfinder/browse.php?opener=ckeditor&type=files';
  config.filebrowserImageUploadUrl = null; //'http://expl4ined.eu/app/kcfinder/browse.php?opener=ckeditor&type=files';
  config.filebrowserFlashUploadUrl = null; //'http://expl4ined.eu/app/kcfinder/browse.php?opener=ckeditor&type=files';
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

  config.toolbar = 'custom';
  config.toolbar_custom = [
   { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
   { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Scayt' ] },
   { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
   { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'tliyoutube2' ] },
   { name: 'tools', items: [ 'Maximize' ] },
   { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },
   { name: 'others', items: [ '-' ] },
   '/',
   { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
   { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
   { name: 'styles', items: [ 'Styles', 'Format' ] },
   { name: 'about', items: [ 'About' ] }
];
};
