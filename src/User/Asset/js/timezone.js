/*!
 * @version 0.0.1
 *
 * Retreives the client timezone and sends it to the server.
 */
+function ($) {
    "use strict";
    $.userTimeZone = function (destUrl) {
        this.destUrl = destUrl;
    };
    $.userTimeZone.prototype = {
        sendTimeZone: function () {
            let self = this,
                data = {timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone};
            $(document).trigger('timezone.beforeSend', [data]);
            $.get(self.destUrl, data).done(function () {
                $(document).trigger('timezone.afterSend');
            });
        }
    };
}(jQuery);
