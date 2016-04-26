(function() {
  describe('Morris.Donut', function() {
    describe('svg structure', function() {
      var defaults;
      defaults = {
        element: 'graph',
        data: [
          {
            label: 'Jam',
            value: 25
          }, {
            label: 'Frosted',
            value: 40
          }, {
            label: 'Custard',
            value: 25
          }, {
            label: 'Sugar',
            value: 10
          }
        ],
        formatter: function(y) {
          return "" + y + "%";
        }
      };
      it('should contain 2 paths for each segment', function() {
        var chart;
        chart = Morris.Donut($.extend({}, defaults));
        return $('#graph').find("path").size().should.equal(8);
      });
      return it('should contain 2 text elements for the label', function() {
        var chart;
        chart = Morris.Donut($.extend({}, defaults));
        return $('#graph').find("text").size().should.equal(2);
      });
    });
    describe('svg attributes', function() {
      var defaults;
      defaults = {
        element: 'graph',
        data: [
          {
            label: 'Jam',
            value: 25
          }, {
            label: 'Frosted',
            value: 40
          }, {
            label: 'Custard',
            value: 25
          }, {
            label: 'Sugar',
            value: 10
          }
        ],
        formatter: function(y) {
          return "" + y + "%";
        },
        colors: ['#0B62A4', '#3980B5', '#679DC6', '#95BBD7']
      };
      it('should have a label with font size 15', function() {
        var chart;
        chart = Morris.Donut($.extend({}, defaults));
        return $('#graph').find("text[font-size='15px']").size().should.equal(1);
      });
      it('should have a label with font size 14', function() {
        var chart;
        chart = Morris.Donut($.extend({}, defaults));
        return $('#graph').find("text[font-size='14px']").size().should.equal(1);
      });
      it('should have a label with font-weight 800', function() {
        var chart;
        chart = Morris.Donut($.extend({}, defaults));
        return $('#graph').find("text[font-weight='800']").size().should.equal(1);
      });
      it('should have 1 paths with fill of first color', function() {
        var chart;
        chart = Morris.Donut($.extend({}, defaults));
        return $('#graph').find("path[fill='#0b62a4']").size().should.equal(1);
      });
      it('should have 1 paths with stroke of first color', function() {
        var chart;
        chart = Morris.Donut($.extend({}, defaults));
        return $('#graph').find("path[stroke='#0b62a4']").size().should.equal(1);
      });
      it('should have a path with white stroke', function() {
        var chart;
        chart = Morris.Donut($.extend({}, defaults));
        return $('#graph').find("path[stroke='#ffffff']").size().should.equal(4);
      });
      it('should have a path with stroke-width 3', function() {
        var chart;
        chart = Morris.Donut($.extend({}, defaults));
        return $('#graph').find("path[stroke-width='3']").size().should.equal(4);
      });
      return it('should have a path with stroke-width 2', function() {
        var chart;
        chart = Morris.Donut($.extend({}, defaults));
        return $('#graph').find("path[stroke-width='2']").size().should.equal(4);
      });
    });
    return describe('setData', function() {
      var defaults;
      defaults = {
        element: 'graph',
        data: [
          {
            label: 'One',
            value: 25
          }, {
            label: "Two",
            value: 30
          }
        ],
        colors: ['#ff0000', '#00ff00', '#0000ff']
      };
      return it('should update the chart', function() {
        var chart;
        chart = Morris.Donut($.extend({}, defaults));
        $('#graph').find("path[stroke='#0000ff']").size().should.equal(0);
        chart.setData([
          {
            label: 'One',
            value: 25
          }, {
            label: 'Two',
            value: 30
          }, {
            label: 'Three',
            value: 35
          }
        ]);
        return $('#graph').find("path[stroke='#0000ff']").size().should.equal(1);
      });
    });
  });

}).call(this);
