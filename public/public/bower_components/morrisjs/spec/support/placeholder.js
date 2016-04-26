(function() {
  beforeEach(function() {
    var placeholder;
    placeholder = $('<div id="graph" style="width: 600px; height: 400px"></div>');
    return $('#test').append(placeholder);
  });

  afterEach(function() {
    return $('#test').empty();
  });

}).call(this);
