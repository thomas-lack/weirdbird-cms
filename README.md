# weirdbird CMS

This is a little side project to create an intuitive and simple to use cms. Feel free to use it for your own needs if you like.

Target audience are single-purpose sites like blogs and the like.

## Documentation

### Some of the features:

* using the current version of [KOSeven](https://koseven.dev) as PHP backend
* on the client side [Sencha Ext JS](http://www.sencha.com/products/extjs/#overview) is jused
* templating system, configurable in a single xml file
* 2 templates included with one sporting a nice support of twitter bootstrap right out of the box
* file management is possible only by using the cms
* an wysiwyg-article-editor that uses the css definitions of the chosen template
* breakdown of the parts a website consists of (which can be configured separately):
* The layout (e.g. 2-column),
* which consists of modules (e.g. content or navigation),
* which consist of articles (e.g. blog entries)
* currently a maximum link depth of 2 is supported by using teasers for your articles
* language support for the cms is provided in german and english
* articles of specific languages can be filtered via URL parameter (/en/ or /de/) which is nice for multi-language sites

### Local development (wip)

Install docker and start the local dev environment with `docker compose up`.

After the mysql docker image is running, add necessary db schemata by using `mysql -h localhost -P 3306 -protocol=tcp -u root -p weirdbird < /path/to/weirdbird-cms/INSTALL/weirdbird-database-schema.sql`.
