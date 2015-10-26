var Application = Ember.Application.create();

/**
 * Set the root URL of the application.
 */
Application.Router.reopen({
    location: 'auto',
    rootURL: '/'
});

/**
 * Declare the router.
 */
Application.Router.map(function () {
    this.route('about', {path: 'about-us'});
    this.route('band', {path: 'the-band'});
    this.route('dates');
    this.route('discography', function () {
        this.route('album', {path: ':album_id'});
    });
    this.route('videos');
    this.route('contact');
});

Application.ApplicationRoute = Ember.Route.extend({

    actions: {
        toggleMenu: function ()
        {
            var menu = $('#menu');

            if ('true' === menu.attr('aria-hidden')) {
                menu.attr('aria-hidden', 'false');
            } else {
                menu.attr('aria-hidden', 'true');
            }
        },

        linkTo: function (ruleId)
        {
            console.log(ruleId);
            this.controllerFor('application').transitionToRoute(ruleId);
            this.send('toggleMenu');
        }
    }

});

/**
 * About route.
 */
Application.AboutRoute = Ember.Route.extend({

    activate: function ()
    {
        resetScroll();
    }

});

/**
 * Band route.
 */
Application.BandRoute = Ember.Route.extend({

    activate: function ()
    {
        resetScroll();
    }

});

/**
 * Dates route.
 */
Application.DatesRoute = Ember.Route.extend({

    activate: function ()
    {
        resetScroll();
    },

    model: function ()
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

    activate: function ()
    {
        resetScroll();
    },

    model: function ()
    {
        return new Ember.RSVP.Promise(
            function (resolve, reject) {
                $.getJSON(
                    '/api/discography'
                ).done(function (data) {
                    for (var i = 0, max = data.length; i < max; ++i) {
                        data[i].cover = data[i].id.capitalizeFirstLetter() + '_cover';
                        delete data[i].tracks;
                    }

                    resolve(data);
                });
            }
        );
    }

});

/**
 * Album controller.
 */
Application.DiscographyAlbumController = Ember.Controller.extend({

    resetScroll: function () {
        resetScroll('[data-anchor="album"]');
    }.observes('model')

});

/**
 * Album route.
 */
Application.DiscographyAlbumRoute = Ember.Route.extend(Application.ResetScroll, {

    model: function (params, transition)
    {
        return new Ember.RSVP.Promise(
            function (resolve, reject) {
                $.getJSON(
                    '/api/album/' + transition.params['discography.album'].album_id
                ).done(function (data) {
                    data.cover = data.id.capitalizeFirstLetter() + '_cover';

                    resolve(data);
                });
            }
        );
    }

});

/**
 * Videos route.
 */
Application.VideosRoute = Ember.Route.extend({

    activate: function ()
    {
        resetScroll();
    },

    model: function ()
    {
        return new Ember.RSVP.Promise(
            function (resolve, reject) {
                $.getJSON(
                    '/api/videos'
                ).done(function (data) {
                    for (var i = 0, max = data.length; i < max; ++i) {
                        data[i].description         = data[i].description.replace(/\n/g, '<br />');
                        data[i].published_for_human = moment(data[i].published).fromNow();
                    }

                    resolve(data);
                });
            }
        );
    }

});

String.prototype.capitalizeFirstLetter = function () {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

function resetScroll(selector)
{
    var selector = $(selector);

    $('html').animate(
        {
            scrollTop: selector.length ? selector.offset().top : 0
        },
        300
    );
}
