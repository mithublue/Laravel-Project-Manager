(function() {
  describe('Morris.Area', function() {
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
        gridLineColor: '#aaa',
        xkey: 'x',
        ykeys: ['y'],
        labels: ['Y']
      };
      it('should contain a line path for each line', function() {
        var chart;
        chart = Morris.Area($.extend({}, defaults));
        return $('#graph').find("path[stroke='#0b62a4']").size().should.equal(1);
      });
      it('should contain a path with stroke-width 0 for each line', function() {
        var chart;
        chart = Morris.Area($.extend({}, defaults));
        return $('#graph').find("path[stroke='#0b62a4']").size().should.equal(1);
      });
      it('should contain 5 grid lines', function() {
        var chart;
        chart = Morris.Area($.extend({}, defaults));
        return $('#graph').find("path[stroke='#aaaaaa']").size().should.equal(5);
      });
      return it('should contain 9 text elements', function() {
        var chart;
        chart = Morris.Area($.extend({}, defaults));
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
        ykeys: ['y'],
        labels: ['Y'],
        lineColors: ['#0b62a4', '#7a92a3'],
        lineWidth: 3,
        pointWidths: [5],
        pointStrokeColors: ['#ffffff'],
        gridLineColor: '#aaa',
        gridStrokeWidth: 0.5,
        gridTextColor: '#888',
        gridTextSize: 12
      };
      it('should not be cumulative if behaveLikeLine', function() {
        var chart;
        chart = Morris.Area($.extend({}, defaults, {
          behaveLikeLine: true
        }));
        return chart.cumulative.should.equal(false);
      });
      it('should have a line with transparent fill if behaveLikeLine', function() {
        var chart;
        chart = Morris.Area($.extend({}, defaults, {
          behaveLikeLine: true
        }));
        return $('#graph').find("path[fill-opacity='0.8']").size().should.equal(1);
      });
      it('should not have a line with transparent fill', function() {
        var chart;
        chart = Morris.Area($.extend({}, defaults));
        return $('#graph').find("path[fill-opacity='0.8']").size().should.equal(0);
      });
      return it('should have a line with the fill of a modified line color', function() {
        var chart;
        chart = Morris.Area($.extend({}, defaults));
        $('#graph').find("path[fill='#0b62a4']").size().should.equal(0);
        return $('#graph').find("path[fill='#7a92a3']").size().should.equal(0);
      });
    });
  });

}).call(this);
