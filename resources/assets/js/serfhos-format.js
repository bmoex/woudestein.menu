/**
 * Template format usability
 *
 * @type Object
 */
Serfhos.Format = function (container) {
    container = jQuery(container);
    var template = null;

    // Initialize object for
    if (container.length > 0) {
        // Retrieve template object
        var itemTemplate = container.find('.javascript-template');
        if (itemTemplate.length > 0) {
            itemTemplate.removeClass('javascript-template');

            // Add objects to current for usage
            container = itemTemplate.parent();
            template = itemTemplate.clone();

            // Remove template object for output
            itemTemplate.remove();
        }

        // unset itemTemplate
        itemTemplate = null;
    }

    /**
     * Render template with given variables
     *
     * @visibility private
     * @param variables
     * @returns {*}
     */
    function getRenderedTemplate (variables) {
        var content = jQuery(template).html();

        // loop through all variables
        for (var key in variables) {
            if (variables.hasOwnProperty(key)) {
                var lookup = '{{$' + key + '}}';
                content = content.replace(lookup, variables[key]);
            }
        }
        return content;
    }

    /**
     * Add rendered content template to container
     *
     * @visibility public
     * @param variables
     * @return void
     */
    this.addContent = function (variables) {
        jQuery(container).append(
                getRenderedTemplate(variables)
        );
    };

    /**
     * Replace rendered content template to container
     *
     * @visibility public
     * @param variables
     * @return void
     */
    this.replaceContent = function (variables) {
        jQuery(container).html(
                getRenderedTemplate(variables)
        );
    };
};