// Short script to encode our SVG in base64
// This can be reversed using window.atob('base64')
var code = document.getElementById('code');
var demo = document.getElementById('demo');
var svg = document.getElementsByTagName('svg')[0];

// Convert the SVG node to HTML.
var div = document.createElement('div');
div.appendChild(svg.cloneNode(true));

// Encode the SVG as base64
var b64 = 'data:image/svg+xml;base64,'+window.btoa(div.innerHTML);
var url = 'url("' + b64 + '")';
code.innerHTML = 'Base64 CSS (for cross-browser compatibility)\n\nbackground-image: ' + url + ';';
demo.style.backgroundImage = url;