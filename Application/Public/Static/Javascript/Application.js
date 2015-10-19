var Application = Ember.Application.create();

/**
 * Set the root URL of the application.
 */
Application.Router.reopen({
    rootURL: window.location.pathname
});

/**
 * Declare the router.
 */
Application.Router.map(function () {
    this.route('about', {path: 'about-us'});
    this.route('band', {path: 'the-band'});
    this.route('dates');
    this.route('discography');
    this.route('gallery');
    this.route('contact');
});

/**
 * Dates route.
 */
Application.DatesRoute = Ember.Route.extend({

    model: function()
    {
        return new Ember.RSVP.Promise(
            function (resolve, reject) {
                $.getJSON(
                    '/api/dates'
                ).done(function (data) {
                    var previousYear = null;
                    for (var i = 0, max = data.length; i < max; ++i) {
                        var _handle        = moment(data[i].date);
                        data[i].date_day   = _handle.format('DD');
                        data[i].date_month = _handle.format('MMM');
                        data[i].date_year  = _handle.format('YYYY');

                        if (data[i].date_year !== previousYear) {
                            previousYear    = data[i].date_year;
                            data[i].newYear = true;
                        } else {
                            data[i].newYear = false;
                        }
                    }

                    resolve(data);
                });
            }
        );
    }

});

/**
 * Discography route.
 */
Application.DiscographyRoute = Ember.Route.extend({

    model: function()
    {
        return new Ember.RSVP.Promise(
            function (resolve, reject) {
                $.getJSON(
                    '/api/discography'
                ).done(function (data) {
                    for (var i = 0, max = data.length; i < max; ++i) {
                        delete data.tracks;
                    }

                    resolve(data);
                });
            }
        );
    }

});
