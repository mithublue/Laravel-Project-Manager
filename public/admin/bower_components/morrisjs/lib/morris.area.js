(function() {
  var __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  Morris.Area = (function(_super) {
    var areaDefaults;

    __extends(Area, _super);

    areaDefaults = {
      fillOpacity: 'auto',
      behaveLikeLine: false
    };

    function Area(options) {
      var areaOptions;
      if (!(this instanceof Morris.Area)) {
        return new Morris.Area(options);
      }
      areaOptions = $.extend({}, areaDefaults, options);
      this.cumulative = !areaOptions.behaveLikeLine;
      if (areaOptions.fillOpacity === 'auto') {
        areaOptions.fillOpacity = areaOptions.behaveLikeLine ? .8 : 1;
      }
      Area.__super__.constructor.call(this, areaOptions);
    }

    Area.prototype.calcPoints = function() {
      var row, total, y, _i, _len, _ref, _results;
      _ref = this.data;
      _results = [];
      for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        row = _ref[_i];
        row._x = this.transX(row.x);
        total = 0;
        row._y = (function() {
          var _j, _len1, _ref1, _results1;
          _ref1 = row.y;
          _results1 = [];
          for (_j = 0, _len1 = _ref1.length; _j < _len1; _j++) {
            y = _ref1[_j];
            if (this.options.behaveLikeLine) {
              _results1.push(this.transY(y));
            } else {
              total += y || 0;
              _results1.push(this.transY(total));
            }
          }
          return _results1;
        }).call(this);
        _results.push(row._ymax = Math.max.apply(Math, row._y));
      }
      return _results;
    };

    Area.prototype.drawSeries = function() {
      var i, range, _i, _j, _k, _len, _ref, _ref1, _results, _results1, _results2;
      this.seriesPoints = [];
      if (this.options.behaveLikeLine) {
        range = (function() {
          _results = [];
          for (var _i = 0, _ref = this.options.ykeys.length - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; 0 <= _ref ? _i++ : _i--){ _results.push(_i); }
          return _results;
        }).apply(this);
      } else {
        range = (function() {
          _results1 = [];
          for (var _j = _ref1 = this.options.ykeys.length - 1; _ref1 <= 0 ? _j <= 0 : _j >= 0; _ref1 <= 0 ? _j++ : _j--){ _results1.push(_j); }
          return _results1;
        }).apply(this);
      }
      _results2 = [];
      for (_k = 0, _len = range.length; _k < _len; _k++) {
        i = range[_k];
        this._drawFillFor(i);
        this._drawLineFor(i);
        _results2.push(this._drawPointFor(i));
      }
      return _results2;
    };

    Area.prototype._drawFillFor = function(index) {
      var path;
      path = this.paths[index];
      if (path !== null) {
        path = path + ("L" + (this.transX(this.xmax)) + "," + this.bottom + "L" + (this.transX(this.xmin)) + "," + this.bottom + "Z");
        return this.drawFilledPath(path, this.fillForSeries(index));
      }
    };

    Area.prototype.fillForSeries = function(i) {
      var color;
      color = Raphael.rgb2hsl(this.colorFor(this.data[i], i, 'line'));
      return Raphael.hsl(color.h, this.options.behaveLikeLine ? color.s * 0.9 : color.s * 0.75, Math.min(0.98, this.options.behaveLikeLine ? color.l * 1.2 : color.l * 1.25));
    };

    Area.prototype.drawFilledPath = function(path, fill) {
      return this.raphael.path(path).attr('fill', fill).attr('fill-opacity', this.options.fillOpacity).attr('stroke', 'none');
    };

    return Area;

  })(Morris.Line);

}).call(this);
