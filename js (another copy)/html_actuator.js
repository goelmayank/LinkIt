function HTMLActuator() {
    this.tileContainer = document.querySelector(".tile-container");
    this.scoreContainer = document.querySelector(".score-container");
    this.bestContainer = document.querySelector(".best-container");
    this.messageContainer = document.querySelector(".game-message");
    this.sharingContainer = document.querySelector(".score-sharing");
    this.score = 0;
    this.valueMap = {};
}

HTMLActuator.prototype.actuate = function(grid, metadata) {
    var self = this;

    window.requestAnimationFrame(function() {
        self.clearContainer(self.tileContainer);

        grid.cells.forEach(function(column) {
            column.forEach(function(cell) {
                if (cell) {
                    self.addTile(cell);
                }
            });
        });

        self.updateScore(metadata.score);
        self.updateBestScore(metadata.bestScore);

        if (metadata.terminated) {
            if (metadata.over) {
                self.message(false); // You lose

            } else if (metadata.won) {
                self.message(true); // You win!
            }
        }
    });
};
var english = 1;
$(".hindi").click(function() {
    english = 0;
});

// Get words on grid at the time game gets over.
// HTMLActuator.prototype.write = function() {
/*   console.log(this.words);
   console.log("hi");
   // $("#words").val(this.words);
   $("#words").val("holy creep!");
   this.words = {};
   this.clearMessage();*/
// };-

// Continues the game (both restart and keep playing)
HTMLActuator.prototype.continueGame = function() {
    if (typeof ga !== "undefined") {
        ga("send", "event", "game", "restart");
    }
    this.clearMessage();
};

HTMLActuator.prototype.clearContainer = function(container) {
    while (container.firstChild) {
        container.removeChild(container.firstChild);
    }
};

HTMLActuator.prototype.addTile = function(tile) {
    if (english) {
        var valueMap = {
            2: ['plea ', 'glee ', 'see ', 'free ', 'glee ', 'flea ', 'bee ', 'tea ', 'sea ', 'fee ', 'knee ', 'tree '],
            4: ['hate ', 'bait ', 'state ', 'late ', 'gait ', 'great ', 'mate ', 'wait ', 'bate ', 'late ', 'date ', 'gate ', 'fate ', 'rate ', 'straight ', 'weight ', 'date ', 'bait ', 'bate ', 'great ', 'migrate ', 'gait ', 'freight ', 'stake ', 'skate ', 'state ', 'straight ', 'strait ', 'wait ', 'trait ', 'plait ', 'plate ', 'grate ', 'migrate ', 'mutate ', 'mate ', 'narrate ', 'eight ', 'hate ', 'prostate ', 'stagnate ', 'rate '],
            8: ['beach ', 'preach ', 'teach ', 'reach ', 'peach ', 'leech ', 'beseech ', 'reach ', 'screech ', 'leech ', 'impeach ', 'each ', 'bleach ', 'speech '],
            16: ['bean ', 'mean ', 'obscene ', 'seen ', 'scene ', 'dean ', 'sheen ', 'teen ', 'canteen ', 'clean ', 'screen ', 'marine ', 'machine ', 'unseen ', 'mien ', 'gene ', 'keen ', 'queen '],
            32: ['today ', 'sway ', 'slay ', 'dismay ', 'away ', 'ray ', 'way ', 'gay ', 'leigh ', 'kneigh ', 'delay ', 'play ', 'pray ', 'stay '],
            64: ['plan ', 'began ', 'span ', 'van ', 'scan ', 'man ', 'tan ', 'than ', 'lifespan ', 'fan ', 'clan ', 'caravan '],
            128: ['mane ', 'train ', 'lane ', 'strain '],
            256: ['English ', 'Selfish ', 'dish ', 'fish ', 'finish '],
            512: ['tile ', 'while ', 'file ', 'agile ', 'reconcile '],
            1024: ['treat ', 'beat ', 'retreat ', 'meat ', 'fleet '],
            2048: ['gaze ', 'amaze ', 'daze ', 'maze '],
            4096: ['frame ', 'game ', 'lame ', 'shame ', 'tame ']
        }
    } else {
        var valueMap = {
            2: ['नहीं ', 'कहीं ', 'वहीं ', 'कभी ', 'यूँहीं ', 'यहीं ', 'सही ', 'राही ', 'माही ', 'शाही ', ],
            4: ['भेंट ', 'सेठ ', 'ठेठ ', 'पेट ', 'बैठ ', 'समेत ', 'फेंट ', 'संकेत ', 'संदेश ', ],
            8: ['बीच ', 'खींच ', 'सींच ', 'मीच ', 'रीछ ', 'भींच '],
            16: ['नमकीन ', 'संकीर्ण ', 'गमगीन ', 'नाजनीन ', 'तक़सीम ', 'आस्तीन ', 'तालीम ', 'शौकीन ', 'रंगीन ', 'संगीन ', 'हक़ीम '],
            32: ['समय ', 'प्रलय ', 'सुजय ', 'अभय ', 'भय ', 'परिणय ', 'सुजय ', 'मय ', 'लय ', 'अभय ', 'भय ', 'जय ', 'तनमय ', 'विनय '],
            64: ['बंधन ', 'नन्दन ', 'सघन ', 'स्पन्दन ', 'बदन ', 'बचन ', 'बहन ', 'समापन ', 'चलन ', 'गगन ', 'अमन ', 'सावन ', 'साधन ', 'मनन ', 'आनन ', 'नयन ', 'बचपन ', 'कंचन ', 'चन्दन ', 'स्वप्न ', 'क्रंदन ', 'शोधन '],
            128: ['चैन ', 'नैन ', 'बैन ', 'रैन ', 'बेचैन '],
            256: ['कुरान ', 'इंसान ', 'हैरान ', 'आसान ', 'पहचान ', 'अंजान ', 'अनुमान ', 'अभिमान ', 'एहसान '],
            512: ['दुखाना ', 'बुलाना ', 'बहलाना ', 'बहकना ', 'बहकाना ', 'बहाना ', 'पुराना ', 'शायराना ', 'बताना ', 'ठिकाना ', 'सीखना ', 'मुस्कुराना ', 'कमाना ', 'आज़माना ', 'बचाना ', 'लगाना ', 'आना '],
            1024: ['कासा ', 'साया ', 'चेहरा ', 'धोखा ', 'पहरा ', 'तिनका ', 'दरिया ', 'दुनिया'],
            2048: ['भक्त ', 'व्यक्त ', 'अभिव्यक्त ', 'सख़्त ', 'तख़्त ', 'अशक्त ', 'विरक्त ', 'अस्त ', 'व्यस्त ', 'अभिशप्त '],
            4096: ['नाम ', 'बदनाम ', 'हराम ', 'काम ', 'कलाम ', 'शाम ', 'विराम ', 'मुक़ाम ', 'पैगाम ', 'पयाम ', 'गुलाम ', 'तमाम ']
        }
    }
    this.valueMap = valueMap;
    var self = this;

    var wrapper = document.createElement("div");
    var inner = document.createElement("div");

    var position = tile.previousPosition || {
        x: tile.x,
        y: tile.y
    };
    var positionClass = this.positionClass(position);

    // We can 't use classlist because it somehow glitches when replacing classes
    var classes = ["tile", "tile-" + tile.value, positionClass];

    if (tile.value > 2048) classes.push("tile-super");

    this.applyClasses(wrapper, classes);

    inner.classList.add("tile-inner");
    inner.textContent = valueMap[tile.value][tile.index];
    // inner.style.background =  'url(tile-sets/words/ ' + tile.value +  '- ' + (Math.floor(Math.random()*10)%2 +1) + '.png) no-repeat ';
    // inner.style.backgroundSize =  '107px 107px ';

    if (tile.previousPosition) {
        // Make sure that the tile gets rendered in the previous position first
        window.requestAnimationFrame(function() {
            classes[2] = self.positionClass({
                x: tile.x,
                y: tile.y
            });
            self.applyClasses(wrapper, classes); // Update the position
        });
    } else if (tile.mergedFrom) {
        classes.push("tile-merged");
        this.applyClasses(wrapper, classes);

        // Render the tiles that merged
        tile.mergedFrom.forEach(function(merged) {
            self.addTile(merged);
        });
    } else {
        classes.push("tile-new");
        this.applyClasses(wrapper, classes);
    }

    // Add the inner part of the tile to the wrapper
    wrapper.appendChild(inner);

    // Put the tile on the board
    this.tileContainer.appendChild(wrapper);
};

HTMLActuator.prototype.applyClasses = function(element, classes) {
    element.setAttribute("class", classes.join(" "));
};

HTMLActuator.prototype.normalizePosition = function(position) {
    return {
        x: position.x + 1,
        y: position.y + 1
    };
};

HTMLActuator.prototype.positionClass = function(position) {
    position = this.normalizePosition(position);
    return "tile-position-" + position.x + "-" + position.y;
};

HTMLActuator.prototype.updateScore = function(score) {
    this.clearContainer(this.scoreContainer);

    var difference = score - this.score;
    this.score = score;

    this.scoreContainer.textContent = this.score;

    if (difference > 0) {
        var addition = document.createElement("div");
        addition.classList.add("score-addition");
        addition.textContent = "+" + difference;

        this.scoreContainer.appendChild(addition);
    }
};

HTMLActuator.prototype.updateBestScore = function(bestScore) {
    this.bestContainer.textContent = bestScore;
};

HTMLActuator.prototype.message = function(won) {
    var type = won ? "game-won" : "game-over";
    var message = won ? "You win!" : "Game over!";

    if (typeof ga !== "undefined") {
        ga("send", "event", "game", "end", type, this.score);
    }

    this.messageContainer.classList.add(type);
    this.messageContainer.getElementsByTagName("p")[0].textContent = message;

    this.clearContainer(this.sharingContainer);
    this.sharingContainer.appendChild(this.scoreTweetButton());
    twttr.widgets.load();
};

HTMLActuator.prototype.clearMessage = function() {
    // IE only takes one value to remove at a time.
    this.messageContainer.classList.remove("game-won");
    this.messageContainer.classList.remove("game-over");
};

HTMLActuator.prototype.scoreTweetButton = function() {
    var tweet = document.createElement("a");
    tweet.classList.add("twitter-share-button");
    tweet.setAttribute("href", "https://twitter.com/share");
    tweet.textContent = "Tweet";

    var text = "" + this.score + " points in LinkIt."
    tweet.setAttribute("data-text", text);

    return tweet;
};
