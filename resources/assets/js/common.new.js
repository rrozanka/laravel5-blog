function CommonFunctions () {}

var Common = new CommonFunctions;

/**
 * Flash message
 *
 * @param message
 * @param type
 */
CommonFunctions.prototype.flashMessage = function(message, type) {
    noty({
        text: message,
        layout: 'bottomLeft',
        type: type,
        timeout: 2500
    });
};