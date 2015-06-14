This is a little side project to create an intuitive and simple to use cms.
Feel free to use it for your own needs if you like.

## Some of the features: ##
  * using the current version of <a href='http://kohanaframework.org/'>kohana</a> as PHP backend
  * on the client side <a href='http://www.sencha.com/products/extjs/'>extjs</a> is jused
  * templating system, configurable in a single xml file
  * 2 templates included with one sporting a nice support of twitter bootstrap right out of the box
  * file management is possible only by using the cms
  * an wysiwyg-article-editor that uses the css definitions of the chosen template
  * breakdown of the parts a website consists of (which can be configured separately):
    * The layout (e.g. _2-column_),
    * which consists of modules (e.g. _content_ or _navigation_),
    * which consist of articles (e.g. _blog entries_)
  * currently a maximum link depth of 2 is supported by using teasers for your articles
  * language support for the cms is provided in german and english
  * articles of specific languages can be filtered via URL parameter (/en/ or /de/) which is nice for multi-language sites