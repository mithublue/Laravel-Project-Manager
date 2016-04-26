(function() {
  describe('Morris.Bar', function() {
    describe('when using vertical grid', function() {
      var defaults;
      defaults = {
        element: 'graph',
        data: [
          {
            x: 'foo',
            y: 2,
            z: 3
          }, {
            x: 'bar',
            y: 4,
            z: 6
          }
        ],
        xkey: 'x',
        ykeys: ['y', 'z'],
        labels: ['Y', 'Z'],
        barColors: ['#0b62a4', '#7a92a3'],
        gridLineColor: '#aaa',
        gridStrokeWidth: 0.5,
        gridTextColor: '#888',
        gridTextSize: 12,
        verticalGridCondition: function(index) {
          return index % 2;
        },
        verticalGridColor: '#888888',
        verticalGridOpacity: '0.2'
      };
      describe('svg structure', function() {
        return it('should contain extra rectangles for vertical grid', function() {
          var chart;
          $('#graph').css('height', '250px').css('width', '800px');
          chart = Morris.Bar($.extend({}, defaults));
          return $('#graph').find("rect").size().should.equal(6);
        });
      });
      return describe('svg attributes', function() {
        it('should have to bars with verticalGrid.color', function() {
          var chart;
          chart = Morris.Bar($.extend({}, defaults));
          return $('#graph').find("rect[fill='" + defaults.verticalGridColor + "']").size().should.equal(2);
        });
        return it('should have to bars with verticalGrid.color', function() {
          var chart;
          chart = Morris.Bar($.extend({}, defaults));
          return $('#graph').find("rect[fill-opacity='" + defaults.verticalGridOpacity + "']").size().should.equal(2);
        });
      });
    });
    describe('svg structure', function() {
      var defaults;
      defaults = {
        element: 'graph',
        data: [
          {
            x: 'foo',
            y: 2,
            z: 3
          }, {
            x: 'bar',
            y: 4,
            z: 6
          }
        ],
        xkey: 'x',
        ykeys: ['y', 'z'],
        labels: ['Y', 'Z']
      };
      it('should contain a rect for each bar', function() {
        var chart;
        chart = Morris.Bar($.extend({}, defaults));
        return $('#graph').find("rect").size().should.equal(4);
      });
      it('should contain 5 grid lines', function() {
        var chart;
        chart = Morris.Bar($.extend({}, defaults));
        return $('#graph').find("path").size().should.equal(5);
      });
      return it('should contain 7 text elements', function() {
        var chart;
        chart = Morris.Bar($.extend({}, defaults));
        return $('#graph').find("text").size().should.equal(7);
      });
    });
    describe('svg attributes', function() {
      var defaults;
      defaults = {
        element: 'graph',
        data: [
          {
            x: 'foo',
            y: 2,
            z: 3
          }, {
            x: 'bar',
            y: 4,
            z: 6
          }
        ],
        xkey: 'x',
        ykeys: ['y', 'z'],
        labels: ['Y', 'Z'],
        barColors: ['#0b62a4', '#7a92a3'],
        gridLineColor: '#aaa',
        gridStrokeWidth: 0.5,
        gridTextColor: '#888',
        gridTextSize: 12
      };
      it('should have a bar with the first default color', function() {
        var chart;
        chart = Morris.Bar($.extend({}, defaults));
        return $('#graph').find("rect[fill='#0b62a4']").size().should.equal(2);
      });
      it('should have a bar with no stroke', function() {
        var chart;
        chart = Morris.Bar($.extend({}, defaults));
        return $('#graph').find("rect[stroke='none']").size().should.equal(4);
      });
      it('should have text with configured fill color', function() {
        var chart;
        chart = Morris.Bar($.extend({}, defaults));
        return $('#graph').find("text[fill='#888888']").size().should.equal(7);
      });
      return it('should have text with configured font size', function() {
        var chart;
        chart = Morris.Bar($.extend({}, defaults));
        return $('#graph').find("text[font-size='12px']").size().should.equal(7);
      });
    });
    describe('when setting bar radius', function() {
      return describe('svg structure', function() {
        var defaults;
        defaults = {
          element: 'graph',
          data: [
            {
              x: 'foo',
              y: 2,
              z: 3
            }, {
              x: 'bar',
              y: 4,
              z: 6
            }
          ],
          xkey: 'x',
          ykeys: ['y', 'z'],
          labels: ['Y', 'Z'],
          barRadius: [5, 5, 0, 0]
        };
        it('should contain a path for each bar', function() {
          var chart;
          chart = Morris.Bar($.extend({}, defaults));
          return $('#graph').find("path").size().should.equal(9);
        });
        return it('should use rects if radius is too big', function() {
          var chart;
          delete defaults.barStyle;
          chart = Morris.Bar($.extend({}, defaults, {
            barRadius: [300, 300, 0, 0]
          }));
          return $('#graph').find("rect").size().should.equal(4);
        });
      });
    });
    return describe('barSize option', function() {
      return describe('svg attributes', function() {
        var defaults;
        defaults = {
          element: 'graph',
          barSize: 20,
          data: [
            {
              x: '2011 Q1',
              y: 3,
              z: 2,
              a: 3
            }, {
              x: '2011 Q2',
              y: 2,
              z: null,
              a: 1
            }, {
              x: '2011 Q3',
              y: 0,
              z: 2,
              a: 4
            }, {
              x: '2011 Q4',
              y: 2,
              z: 4,
              a: 3
            }
          ],
          xkey: 'x',
          ykeys: ['y', 'z', 'a'],
          labels: ['Y', 'Z', 'A']
        };
        it('should calc the width if too narrow for barSize', function() {
          var chart;
          $('#graph').width('200px');
          chart = Morris.Bar($.extend({}, defaults));
          return $('#graph').find("rect").filter(function(i) {
            return parseFloat($(this).attr('width'), 10) < 10;
          }).size().should.equal(11);
        });
        return it('should set width to @options.barSize if possible', function() {
          var chart;
          chart = Morris.Bar($.extend({}, defaults));
          return $('#graph').find("rect[width='" + defaults.barSize + "']").size().should.equal(11);
        });
      });
    });
  });

}).call(this);
