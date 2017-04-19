/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here.
    // For the complete reference:
    // http://docs.ckeditor.com/#!/api/CKEDITOR.config

    // The toolbar groups arrangement, optimized for two toolbar rows.
    config.toolbar = window.userRole == 'editor' ? 'Basic' : 'Standard';

    config.toolbar_Basic = [
        ['Bold', 'Italic'],
    ];

    config.toolbar_Standard = [
        ['Bold', 'Italic', 'Underline', 'Strike'],
        ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'],
        ['Link', 'Unlink']
    ];

    // Se the most common block elements.
    config.format_tags = 'p';

    // Make dialogs simpler.
    config.removeDialogTabs = 'image:advanced;link:advanced';

    // elFinder
    config.filebrowserBrowseUrl = 'admin/elfinder/ckeditor';

    CKEDITOR.on( 'dialogDefinition', function( ev ) {
        // Take the dialog name and its definition from the event data.
        var dialogName = ev.data.name;
        var dialogDefinition = ev.data.definition;

        // Check if the definition is from the dialog window you are interested in (the "Link" dialog window).
        if ( dialogName === 'link' ) {
            // Get a reference to the "Link Info" tab.
            var infoTab = dialogDefinition.getContents( 'info' );
            var targetTab = dialogDefinition.getContents('target');

            // Set protocols
            infoTab.remove( 'protocol');

            // Set link types
            var linkOptions = infoTab.get('linkType');
            linkOptions['items'] = [['URL', 'url'], ['E-Mail', 'email']];

            // Set the default value for the URL field.
            var urlField = infoTab.get( 'url' );
            var targetField = targetTab.get( 'linkTargetType' );
            urlField[ 'default' ] = '/';
            targetField['default'] = '_blank';
        }
    });
};
