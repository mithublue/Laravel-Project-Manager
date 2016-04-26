(function() {
  describe("Morris.Hover", function() {
    describe("with dummy content", function() {
      beforeEach(function() {
        var parent;
        parent = $('<div style="width:200px;height:180px"></div>').appendTo($('#test'));
        this.hover = new Morris.Hover({
          parent: parent
        });
        return this.element = $('#test .morris-hover');
      });
      it("should initialise a hidden, empty popup", function() {
        this.element.should.exist;
        this.element.should.be.hidden;
        return this.element.should.be.empty;
      });
      describe("#show", function() {
        return it("should show the popup", function() {
          this.hover.show();
          return this.element.should.be.visible;
        });
      });
      describe("#hide", function() {
        return it("should hide the popup", function() {
          this.hover.show();
          this.hover.hide();
          return this.element.should.be.hidden;
        });
      });
      describe("#html", function() {
        return it("should replace the contents of the element", function() {
          this.hover.html('<div>Foobarbaz</div>');
          return this.element.should.have.html('<div>Foobarbaz</div>');
        });
      });
      return describe("#moveTo", function() {
        beforeEach(function() {
          return this.hover.html('<div style="width:84px;height:84px"></div>');
        });
        it("should place the popup directly above the given point", function() {
          this.hover.moveTo(100, 150);
          this.element.should.have.css('left', '50px');
          return this.element.should.have.css('top', '40px');
        });
        it("should place the popup below the given point if it does not fit above", function() {
          this.hover.moveTo(100, 50);
          this.element.should.have.css('left', '50px');
          return this.element.should.have.css('top', '60px');
        });
        it("should center the popup vertically if it will not fit above or below", function() {
          this.hover.moveTo(100, 100);
          this.element.should.have.css('left', '50px');
          return this.element.should.have.css('top', '40px');
        });
        return it("should center the popup vertically if no y value is supplied", function() {
          this.hover.moveTo(100);
          this.element.should.have.css('left', '50px');
          return this.element.should.have.css('top', '40px');
        });
      });
    });
    return describe("#update", function() {
      return it("should update content, show and reposition the popup", function() {
        var el, hover, html;
        hover = new Morris.Hover({
          parent: $('#test')
        });
        html = "<div style='width:84px;height:84px'>Hello, Everyone!</div>";
        hover.update(html, 150, 200);
        el = $('#test .morris-hover');
        el.should.have.css('left', '100px');
        el.should.have.css('top', '90px');
        return el.should.have.text('Hello, Everyone!');
      });
    });
  });

}).call(this);
