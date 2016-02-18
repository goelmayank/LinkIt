var i=0;
function Tile(position, value, index) {
  this.x                = position.x;
  this.y                = position.y;
  this.value            = value || 2;
  this.index            = index || Math.floor(Math.random() * 100) % 4;
  // console.log(i++ + ' ' + this.x + ' ' + this.y + ' ' + this.value + ' ' + this.index);
  this.previousPosition = null;
  this.mergedFrom       = null; // Tracks tiles that merged together
}

Tile.prototype.savePosition = function () {
  this.previousPosition = { x: this.x, y: this.y };
};

Tile.prototype.updatePosition = function (position) {
  this.x = position.x;
  this.y = position.y;
};

Tile.prototype.serialize = function () {
  return {
    position: {
      x: this.x,
      y: this.y
    },
    value: this.value
  };
};
