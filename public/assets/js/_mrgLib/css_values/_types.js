var CSSValue = require('./cssvalue');
var CSSColor = require('./color/csscolor');

var integerFormat = "((-|\\+)?[0-9]+)";
var integerRegExp = new RegExp("^" + integerFormat + "$");

var numberFormat = "((-|\\+)?\\d*(\\.\\d+)?(e\\d+)?)";
var numberRegExp = new RegExp("^" + numberFormat + "$");

var percentageRegExp = new RegExp("^" + numberFormat + "%" + "$", "i");

var lengthUnits = "(em|ex|ch|rem|vw|vh|vmin|vmax|cm|mm|q|in|pc|pt|px)";
var lengthRegExp = new RegExp("^" + numberFormat + lengthUnits + "$", "i");

var absoluteSizeFormat = "(xx\\-small|x\\-small|small|medium|large|x\\-large|xx\\-large)";
var absoluteSizeRegExp = new RegExp("^" + absoluteSizeFormat + "$", "i");

var relativeSizeFormat = "(larger|smaller)";
var relativeSizeRegExp = new RegExp("^" + relativeSizeFormat + "$", "i");

var fontWeightFormat = "(normal|bold|bolder|lighter|[1-9]00)";
var fontWeightRegExp = new RegExp("^" + fontWeightFormat + "$", "i");

exports.absoluteSize = function (value) {
  var match = String(value).match(absoluteSizeRegExp);
  if (match) {
    return new CSSValue('absolute-size', String(match[1]));
  }
};

exports.fontWeight = function (value) {
  var match = String(value).match(fontWeightRegExp);
  if (match) {
    return new CSSValue('font-weight', String(match[1]));
  }
};

exports.integer = function (value) {
  var match = String(value).match(integerRegExp);
  if (match) {
    return new CSSValue('integer', Number(match[1]));
  }
};

exports.length = function (value) {
  var match = String(value).match(lengthRegExp);
  if (match) {
    return new CSSValue('length', Number(match[1]), match[5].toLowerCase());
  }
};

exports.number = function (value) {
  var match = String(value).match(numberRegExp);
  if (match) {
    return new CSSValue('number', Number(match[1]));
  }
};

exports.percentage = function (value) {
  var match = String(value).match(percentageRegExp);
  if (match) {
    return new CSSValue('percentage', Number(match[1]) / 100);
  }
};

exports.relativeSize = function (value) {
  var match = String(value).match(relativeSizeRegExp);
  if (match) {
    return new CSSValue('relative-size', String(match[1]));
  }
};

exports.color = function (value) {
  var color = CSSColor.parse(value);
  if (color) {
    return new CSSValue('color', color);
  }
};