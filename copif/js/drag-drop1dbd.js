
/**
 * Default function. Returns False, so will prevent default and stop propagation.
 *
 * @author  Chris Green
 * @param  object e Event object
 * @return bool   False
 */
function defaultFunc(e) {
    return false;
}

/**
 * Drag and drop handler. Adds functions passed in as args as callback functions for the different drag and drop events.
 *
 * @author  Chris Green
 * @param  object args Object of named arguments
 */
function dragDrop(args) {

    // merges args passed in with defaults
    var options = $.extend(true, {
        id: undefined,
        dragstart: defaultFunc,
        drag: defaultFunc,
        dragenter: defaultFunc,
        dragleave: defaultFunc,
        dragover: defaultFunc,
        drop: defaultFunc,
        dragend: defaultFunc
    }, args);


    if (window.File && window.FileList && window.FileReader && !$.browser.msie && !$.browser.safari) {

        // Dropzone element
        var dropzone = $(options.id);

        dropzone.on('dragstart', options.dragstart);

        dropzone.on('drag', options.drag);

        dropzone.on('dragenter', options.dragenter);

        dropzone.on('dragleave', options.dragleave);

        dropzone.on('dragover', options.dragover);

        dropzone.on('drop', options.drop);

        dropzone.on('dragend', options.dragend);

        // Stops stuff heppening when file dropped in document
        $(document).on('drop dragover', defaultFunc);

    }
};
