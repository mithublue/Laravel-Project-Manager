(function() {
  describe('Morris.Grid#yLabelFormat', function() {
    return it('should use custom formatter for y labels', function() {
      var formatter, line;
      formatter = function(label) {
        var flabel;
        flabel = parseFloat(label) / 1000;
        return "" + (flabel.toFixed(1)) + "k";
      };
      line = Morris.Line({
        element: 'graph',
        data: [
          {
            x: 1,
            y: 1500
          }, {
            x: 2,
            y: 2500
          }
        ],
        xkey: 'x',
        ykeys: ['y'],
        labels: ['dontcare'],
        preUnits: "$",
        yLabelFormat: formatter
      });
      return line.yLabelFormat(1500).should.equal("1.5k");
    });
  });

}).call(this);
