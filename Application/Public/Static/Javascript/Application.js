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
