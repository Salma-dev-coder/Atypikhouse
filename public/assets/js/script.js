/*
                 * Слайдер
                 */
var REV = {
  preload: function() {
    var parent = $(".reviews-zone");
    origin = $(".reviews-box");
    this.parent = parent;
    origin
      .clone()
      .prependTo(this.parent)
      .clone()
      .appendTo(this.parent);
    origin
      .eq(0)
      .addClass("back left")
      .prevAll(".reviews-box")
      .addClass("hide left");
    origin.eq(1).addClass("front");
    origin
      .eq(2)
      .addClass("back right")
      .nextAll(".reviews-box")
      .addClass("hide right");
    setTimeout(function() {
      parent.addClass("transition");
    }, 20);
  },
  parent: {}, // JQ родительский элемент
  previous: function() {
    var parent = this.parent,
      left = parent.find(".back.left"),
      front = parent.find(".front"),
      right = parent.find(".back.right"),
      last = parent.find(".reviews-box:last");
    left
      .removeClass("back left")
      .addClass("front")
      .prev()
      .removeClass("hide")
      .addClass("back");
    front.removeClass("front").addClass("back right");
    right.removeClass("back").addClass("hide");
    last
      .removeClass("right")
      .addClass("left")
      .prependTo(parent);
  },
  next: function() {
    var parent = this.parent,
      left = parent.find(".back.left"),
      front = parent.find(".front"),
      right = parent.find(".back.right"),
      first = parent.find(".reviews-box:first");
    right
      .removeClass("back right")
      .addClass("front")
      .next()
      .removeClass("hide")
      .addClass("back");
    front.removeClass("front").addClass("back left");
    left.removeClass("back").addClass("hide");
    first
      .removeClass("left")
      .addClass("right")
      .appendTo(parent);
  }
};
REV.preload();