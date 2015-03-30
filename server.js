var connect = require('connect');
var app = connect();

var documentRoot = __dirname;
var port = 8888;
var serveStatic = require('serve-static');
var serveIndex = require('serve-index');
var phpcgi = require('node-phpcgi');

app.use(phpcgi({documentRoot: documentRoot}));
app.use(serveIndex(documentRoot));
app.use(serveStatic(documentRoot));

app.listen(port, function () {
    console.log('serving on port', port);
});