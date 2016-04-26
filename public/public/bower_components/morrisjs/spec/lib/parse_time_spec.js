(function() {
  describe('#parseTime', function() {
    it('should parse years', function() {
      return Morris.parseDate('2012').should.equal(new Date(2012, 0, 1).getTime());
    });
    it('should parse quarters', function() {
      return Morris.parseDate('2012 Q1').should.equal(new Date(2012, 2, 1).getTime());
    });
    it('should parse months', function() {
      Morris.parseDate('2012-09').should.equal(new Date(2012, 8, 1).getTime());
      return Morris.parseDate('2012-10').should.equal(new Date(2012, 9, 1).getTime());
    });
    it('should parse dates', function() {
      Morris.parseDate('2012-09-15').should.equal(new Date(2012, 8, 15).getTime());
      return Morris.parseDate('2012-10-15').should.equal(new Date(2012, 9, 15).getTime());
    });
    it('should parse times', function() {
      Morris.parseDate("2012-10-15 12:34").should.equal(new Date(2012, 9, 15, 12, 34).getTime());
      Morris.parseDate("2012-10-15T12:34").should.equal(new Date(2012, 9, 15, 12, 34).getTime());
      Morris.parseDate("2012-10-15 12:34:55").should.equal(new Date(2012, 9, 15, 12, 34, 55).getTime());
      return Morris.parseDate("2012-10-15T12:34:55").should.equal(new Date(2012, 9, 15, 12, 34, 55).getTime());
    });
    it('should parse times with timezones', function() {
      Morris.parseDate("2012-10-15T12:34+0100").should.equal(Date.UTC(2012, 9, 15, 11, 34));
      Morris.parseDate("2012-10-15T12:34+02:00").should.equal(Date.UTC(2012, 9, 15, 10, 34));
      Morris.parseDate("2012-10-15T12:34-0100").should.equal(Date.UTC(2012, 9, 15, 13, 34));
      Morris.parseDate("2012-10-15T12:34-02:00").should.equal(Date.UTC(2012, 9, 15, 14, 34));
      Morris.parseDate("2012-10-15T12:34:55Z").should.equal(Date.UTC(2012, 9, 15, 12, 34, 55));
      Morris.parseDate("2012-10-15T12:34:55+0600").should.equal(Date.UTC(2012, 9, 15, 6, 34, 55));
      Morris.parseDate("2012-10-15T12:34:55+04:00").should.equal(Date.UTC(2012, 9, 15, 8, 34, 55));
      return Morris.parseDate("2012-10-15T12:34:55-0600").should.equal(Date.UTC(2012, 9, 15, 18, 34, 55));
    });
    return it('should pass-through timestamps', function() {
      return Morris.parseDate(new Date(2012, 9, 15, 12, 34, 55, 123).getTime()).should.equal(new Date(2012, 9, 15, 12, 34, 55, 123).getTime());
    });
  });

}).call(this);
