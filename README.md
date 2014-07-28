# Stripe Pay

Simple bootstrap template for taking a single payment with [Stripe JS](https://stripe.com).

This was developed by [M1ke](http://twitter.com/m1ke) for [Ground Control Skydiving](http://gcskydiving.com)

### Install

Run:

* `php composer.phar update`
* `npm install`
* `bower update`

JS is compiled using [gulp](http://gulpjs.com). Run `gulp scripts` to concatentate and minify.

SASS is compiled using [compass](http://compass-style.org). Run `compass compile`. There is a `gulp` SASS compiler included in the `npm` packages but it gives me an error on running.

### Deployment

Designed to be [deployed using git](https://github.com/M1ke/git-deploy).

You could also fork to deploy with `gulp` which I may move to (deploying with git gets complicated when using package managers).
