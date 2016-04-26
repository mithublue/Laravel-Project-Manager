(function() {
  describe('Morris.Line', function() {
    it('should raise an error when the placeholder element is not found', function() {
      var fn, my_data;
      my_data = [
        {
          x: 1,
          y: 1
        }, {
          x: 2,
          y: 2
        }
      ];
      fn = function() {
        return Morris.Line({
          element: "thisplacedoesnotexist",
          data: my_data,
          xkey: 'x',
          ykeys: ['y'],
          labels: ['dontcare']
        });
      };
      return fn.should["throw"](/Graph container element not found/);
    });
    it('should make point styles customizable', function() {
      var blue, chart, my_data, red;
      my_data = [
        {
          x: 1,
          y: 1
        }, {
          x: 2,
          y: 2
        }
      ];
      red = '#ff0000';
      blue = '#0000ff';
      chart = Morris.Line({
        element: 'graph',
        data: my_data,
        xkey: 'x',
        ykeys: ['y'],
        labels: ['dontcare'],
        pointStrokeColors: [red, blue],
        pointStrokeWidths: [1, 2],
        pointFillColors: [null, red]
      });
      chart.pointStrokeWidthForSeries(0).should.equal(1);
      chart.pointStrokeColorForSeries(0).should.equal(red);
      chart.pointStrokeWidthForSeries(1).should.equal(2);
      chart.pointStrokeColorForSeries(1).should.equal(blue);
      chart.colorFor(chart.data[0], 0, 'point').should.equal(chart.colorFor(chart.data[0], 0, 'line'));
      return chart.colorFor(chart.data[1], 1, 'point').should.equal(red);
    });
    describe('generating column labels', function() {
      it('should use user-supplied x value strings by default', function() {
        var chart;
        chart = Morris.Line({
          element: 'graph',
          data: [
            {
              x: '2012 Q1',
              y: 1
            }, {
              x: '2012 Q2',
              y: 1
            }
          ],
          xkey: 'x',
          ykeys: ['y'],
          labels: ['dontcare']
        });
        return chart.data.map(function(x) {
          return x.label;
        }).should === ['2012 Q1', '2012 Q2'];
      });
      it('should use a default format for timestamp x-values', function() {
        var chart, d1, d2;
        d1 = new Date(2012, 0, 1);
        d2 = new Date(2012, 0, 2);
        chart = Morris.Line({
          element: 'graph',
          data: [
            {
              x: d1.getTime(),
              y: 1
            }, {
              x: d2.getTime(),
              y: 1
            }
          ],
          xkey: 'x',
          ykeys: ['y'],
          labels: ['dontcare']
        });
        return chart.data.map(function(x) {
          return x.label;
        }).should === [d2.toString(), d1.toString()];
      });
      return it('should use user-defined formatters', function() {
        var chart, d;
        d = new Date(2012, 0, 1);
        chart = Morris.Line({
          element: 'graph',
          data: [
            {
              x: d.getTime(),
              y: 1
            }, {
              x: '2012-01-02',
              y: 1
            }
          ],
          xkey: 'x',
          ykeys: ['y'],
          labels: ['dontcare'],
          dateFormat: function(d) {
            var x;
            x = new Date(d);
            return "" + (x.getYear()) + "/" + (x.getMonth() + 1) + "/" + (x.getDay());
          }
        });
        return chart.data.map(function(x) {
          return x.label;
        }).should === ['2012/1/1', '2012/1/2'];
      });
    });
    describe('rendering lines', function() {
      var shouldHavePath;
      beforeEach(function() {
        return this.defaults = {
          element: 'graph',
          data: [
            {
              x: 0,
              y: 1,
              z: 0
            }, {
              x: 1,
              y: 0,
              z: 1
            }, {
              x: 2,
              y: 1,
              z: 0
            }, {
              x: 3,
              y: 0,
              z: 1
            }, {
              x: 4,
              y: 1,
              z: 0
            }
          ],
          xkey: 'x',
          ykeys: ['y', 'z'],
          labels: ['y', 'z'],
          lineColors: ['#abcdef', '#fedcba'],
          smooth: true
        };
      });
      shouldHavePath = function(regex, color) {
        if (color == null) {
          color = '#abcdef';
        }
        return $('#graph').find("path[stroke='" + color + "']").attr('d').should.match(regex);
      };
      it('should generate smooth lines when options.smooth is true', function() {
        Morris.Line(this.defaults);
        return shouldHavePath(/M[\d\.]+,[\d\.]+(C[\d\.]+(,[\d\.]+){5}){4}/);
      });
      it('should generate jagged lines when options.smooth is false', function() {
        Morris.Line($.extend(this.defaults, {
          smooth: false
        }));
        return shouldHavePath(/M[\d\.]+,[\d\.]+(L[\d\.]+,[\d\.]+){4}/);
      });
      it('should generate smooth/jagged lines according to the value for each series when options.smooth is an array', function() {
        Morris.Line($.extend(this.defaults, {
          smooth: ['y']
        }));
        shouldHavePath(/M[\d\.]+,[\d\.]+(C[\d\.]+(,[\d\.]+){5}){4}/, '#abcdef');
        return shouldHavePath(/M[\d\.]+,[\d\.]+(L[\d\.]+,[\d\.]+){4}/, '#fedcba');
      });
      it('should ignore undefined values', function() {
        this.defaults.data[2].y = void 0;
        Morris.Line(this.defaults);
        return shouldHavePath(/M[\d\.]+,[\d\.]+(C[\d\.]+(,[\d\.]+){5}){3}/);
      });
      it('should break the line at null values', function() {
        this.defaults.data[2].y = null;
        Morris.Line(this.defaults);
        return shouldHavePath(/(M[\d\.]+,[\d\.]+C[\d\.]+(,[\d\.]+){5}){2}/);
      });
      return it('should make line width customizable', function() {
        var chart;
        chart = Morris.Line($.extend(this.defaults, {
          lineWidth: [1, 2]
        }));
        chart.lineWidthForSeries(0).should.equal(1);
        return chart.lineWidthForSeries(1).should.equal(2);
      });
    });
    describe('#createPath', function() {
      it('should generate a smooth line', function() {
        var path, testData;
        testData = [
          {
            x: 0,
            y: 10
          }, {
            x: 10,
            y: 0
          }, {
            x: 20,
            y: 10
          }
        ];
        path = Morris.Line.createPath(testData, true, 20);
        return path.should.equal('M0,10C2.5,7.5,7.5,0,10,0C12.5,0,17.5,7.5,20,10');
      });
      it('should generate a jagged line', function() {
        var path, testData;
        testData = [
          {
            x: 0,
            y: 10
          }, {
            x: 10,
            y: 0
          }, {
            x: 20,
            y: 10
          }
        ];
        path = Morris.Line.createPath(testData, false, 20);
        return path.should.equal('M0,10L10,0L20,10');
      });
      it('should prevent paths from descending below the bottom of the chart', function() {
        var path, testData;
        testData = [
          {
            x: 0,
            y: 20
          }, {
            x: 10,
            y: 30
          }, {
            x: 20,
            y: 10
          }
        ];
        path = Morris.Line.createPath(testData, true, 30);
        return path.should.equal('M0,20C2.5,22.5,7.5,30,10,30C12.5,28.75,17.5,15,20,10');
      });
      it('should break the line at null values', function() {
        var path, testData;
        testData = [
          {
            x: 0,
            y: 10
          }, {
            x: 10,
            y: 0
          }, {
            x: 20,
            y: null
          }, {
            x: 30,
            y: 10
          }, {
            x: 40,
            y: 0
          }
        ];
        path = Morris.Line.createPath(testData, true, 20);
        return path.should.equal('M0,10C2.5,7.5,7.5,2.5,10,0M30,10C32.5,7.5,37.5,2.5,40,0');
      });
      return it('should ignore leading and trailing null values', function() {
        var path, testData;
        testData = [
          {
            x: 0,
            y: null
          }, {
            x: 10,
            y: 10
          }, {
            x: 20,
            y: 0
          }, {
            x: 30,
            y: 10
          }, {
            x: 40,
            y: null
          }
        ];
        path = Morris.Line.createPath(testData, true, 20);
        return path.should.equal('M10,10C12.5,7.5,17.5,0,20,0C22.5,0,27.5,7.5,30,10');
      });
    });
    describe('svg structure', function() {
      var defaults;
      defaults = {
        element: 'graph',
        data: [
          {
            x: '2012 Q1',
            y: 1
          }, {
            x: '2012 Q2',
            y: 1
          }
        ],
        lineColors: ['#0b62a4', '#7a92a3'],
        xkey: 'x',
        ykeys: ['y'],
        labels: ['dontcare']
      };
      it('should contain a path that represents the line', function() {
        var chart;
        chart = Morris.Line($.extend({}, defaults));
        return $('#graph').find("path[stroke='#0b62a4']").size().should.equal(1);
      });
      it('should contain a circle for each data point', function() {
        var chart;
        chart = Morris.Line($.extend({}, defaults));
        return $('#graph').find("circle").size().should.equal(2);
      });
      it('should contain 5 grid lines', function() {
        var chart;
        chart = Morris.Line($.extend({}, defaults));
        return $('#graph').find("path[stroke='#aaaaaa']").size().should.equal(5);
      });
      return it('should contain 9 text elements', function() {
        var chart;
        chart = Morris.Line($.extend({}, defaults));
        return $('#graph').find("text").size().should.equal(9);
      });
    });
    return describe('svg attributes', function() {
      var defaults;
      defaults = {
        element: 'graph',
        data: [
          {
            x: '2012 Q1',
            y: 1
          }, {
            x: '2012 Q2',
            y: 1
          }
        ],
        xkey: 'x',
        ykeys: ['y', 'z'],
        labels: ['Y', 'Z'],
        lineColors: ['#0b62a4', '#7a92a3'],
        lineWidth: 3,
        pointStrokeWidths: [5],
        pointStrokeColors: ['#ffffff'],
        gridLineColor: '#aaa',
        gridStrokeWidth: 0.5,
        gridTextColor: '#888',
        gridTextSize: 12,
        pointSize: [5]
      };
      it('should have circles with configured fill color', function() {
        var chart;
        chart = Morris.Line($.extend({}, defaults));
        return $('#graph').find("circle[fill='#0b62a4']").size().should.equal(2);
      });
      it('should have circles with configured stroke width', function() {
        var chart;
        chart = Morris.Line($.extend({}, defaults));
        return $('#graph').find("circle[stroke-width='5']").size().should.equal(2);
      });
      it('should have circles with configured stroke color', function() {
        var chart;
        chart = Morris.Line($.extend({}, defaults));
        return $('#graph').find("circle[stroke='#ffffff']").size().should.equal(2);
      });
      it('should have line with configured line width', function() {
        var chart;
        chart = Morris.Line($.extend({}, defaults));
        return $('#graph').find("path[stroke-width='3']").size().should.equal(1);
      });
      it('should have text with configured font size', function() {
        var chart;
        chart = Morris.Line($.extend({}, defaults));
        return $('#graph').find("text[font-size='12px']").size().should.equal(9);
      });
      it('should have text with configured font size', function() {
        var chart;
        chart = Morris.Line($.extend({}, defaults));
        return $('#graph').find("text[fill='#888888']").size().should.equal(9);
      });
      return it('should have circle with configured size', function() {
        var chart;
        chart = Morris.Line($.extend({}, defaults));
        return $('#graph').find("circle[r='5']").size().should.equal(2);
      });
    });
  });

}).call(this);
