'use strict';
let hi = "hi";
let keystrokes = 0;
let currentID = 0;
let refresh = setInterval(0);
let textToType = document.getElementById('textToType');
let result = document.getElementById('result');
let displayTime = document.getElementById('countdown');
let input = document.getElementById('input');
let inputLenght = null;
let right = 0;
let error = 0;
let correctWords = 0;
let falseWords = 0;
let typedWords = 0;
let wordBank = [];
let startWords = ["der", "knapp", "Arbeit", "Name", "Weg", "zahl", "wer", "dazu", "lang", "land", "machen", "einfach", "mein"]

async function fetchApi(keyword) {
  let url = `https://www.openthesaurus.de/synonyme/search?q=${keyword}&format=application/json`;
  let data = await (await fetch(url)).json();
  let synset = data.synsets;
  synset.forEach(function (array1) {
    let terms = array1.terms;
    terms.forEach(function (array2) {
      let term = array2.term
      if (term.includes('.') || term.includes(" ") || term.length > 10) { } else {
        wordBank.push(term);
      }
    });
  })
}

function wordGenerator() {
  for (var i = 0; i <= 300; i++) {
    var spanID = i;
    var word = wordBank[Math.floor(Math.random() * wordBank.length)];
    var span = document.createElement('span');
    var node = document.createTextNode(word);
    span.setAttribute('id', spanID);
    span.appendChild(node);
    textToType.appendChild(span);
    highlightWord();
  }
}
async function start(a, b, c) {
  await fetchApi(a)
  await fetchApi(b)
  await fetchApi(c)
  wordGenerator();
}

function resetTest() {
  var removeID = 0;
  for (var a = 0; a <= 300; a++) {
    let remove = document.getElementById(removeID);
    remove.remove();
    removeID++;
  }
  keystrokes = 0;
  currentID = 0;
  correctWords = 0;
  falseWords = 0;
  typedWords = 0;
  resetLiveResult();
  wordGenerator();
  hideResult();
  clearInterval(refresh);
  input.focus();
  input.setAttribute('onkeypress', 'startTimer()');
  displayTime.innerHTML = '1:00';
}

function highlightWord() {
  var currentWord = document.getElementById(currentID);
  currentWord.setAttribute('class', 'highlight');
}

function checkUserInput() {
  var currentWord = document.getElementById(currentID);
  let wordToType = currentWord.innerHTML;
  let input = document.getElementById('input').value;
  input = input.replace(/ /g, '');
  if (input == wordToType) {
    setResultColor('right');
    right++;
    liveResult('Correct', right);
  } else {
    setResultColor('false');
    error++;
    liveResult('Error', error);
  }
}

function lineBreak() {
  let top = document.getElementById(currentID).offsetTop;
  if (top > 180) {
    let writtenWords = 0;
    for (var a = 0; a < currentID; a++) {
      let span = document.getElementById(writtenWords);
      span.style.display = 'none';
      writtenWords++;
    }
  }
}

function clearUserInput() {
  document.body.onkeyup = function (key) {
    if (key.code == 'Space' && inputLenght > 1) {
      checkUserInput();
      var input = (document.getElementById('input').value = '');
      document.getElementById(currentID).style.backgroundColor = 'none';
      currentID++;
      highlightWord();
      lineBreak();
      AutoReset();
    } else if (key.code == 'Space' && inputLenght <= 1) {
      var input = (document.getElementById('input').value = '');
    }
  };
}

function setResultColor(result) {
  var currentWord = document.getElementById(currentID);
  currentWord.setAttribute('class', result);
}

function startTimer() {
  document.getElementById('input').removeAttribute('onkeypress');
  const startingMin = 1;
  let time = startingMin * 60;
  refresh = setInterval(updateCountdown, 1000);
  keystrokeCounter();
  detectInputLenght();

  function updateCountdown() {
    const min = Math.floor(time / 60);
    let seconds = time % 60;
    seconds = seconds < 10 ? '0' + seconds : seconds;
    displayTime.innerHTML = `${min}:${seconds}`;
    time--;
    if (time + 1 === 0) {
      document.getElementById('input').value = '';
      clearInterval(refresh);
      showResult();
    }
  }
}

function showResult() {
  getStats();
  result.style.display = 'block';
  document.getElementById('box').style.height = '240px';
  document.getElementById('resultStroke').innerHTML = 'Tastenanschläge: ' + keystrokes;
}

function getStats() {
  textToType.style.display = 'none';
  correctWords = document.getElementsByClassName('right').length;
  falseWords = document.getElementsByClassName('false').length;
  typedWords = correctWords + Math.round(falseWords / 2)
  document.getElementById('resultRight').innerHTML = 'Richtig: ' + correctWords;
  document.getElementById('resultFalse').innerHTML = 'Falsch: ' + falseWords;
  document.getElementById('resultWpm').innerHTML = typedWords + ' WPM';
}

function keystrokeCounter() {
  document.body.onkeydown = function () {
    keystrokes++;
  };
}

function hideResult() {
  document.getElementById('result').style.display = 'none';
  document.getElementById('box').style.height = '109px';
  document.getElementById('textToType').style.display = 'inline';
}

function liveResult(ID, innerHTML) {
  document.getElementById(ID).innerHTML = innerHTML;
}

function resetLiveResult() {
  right = 0;
  error = 0;
  document.getElementById('Error').innerHTML = 0;
  document.getElementById('Correct').innerHTML = 0;
}

function AutoReset() {
  if (error == 20) {
    alert('Du hast mehr als 20 gemacht, der Test wurde zurückgesezt');
    resetTest();
    resetLiveResult();
  }
}

function detectInputLenght() {
  document.body.onkeypress = function () {
    inputLenght = input.value.length;
  };
}

function showForm() {
  document.getElementById('form').style.display = 'block';
  document.getElementById('form').classList.add('fadeIn');
  document.getElementById('formBox').classList.add('slideIn');
}

function hideForm() {
  document.getElementById('form').classList.remove('slideIn');
  document.getElementById('formBox').classList.add('slideOut');
  document.getElementById('form').classList.add('fadeOut');
}
document.querySelector('.saveButton').addEventListener('click', () => document.querySelector(".saveResultBox , .saveButton").classList.toggle('openResultBox'));
document.querySelector('.saveButton').addEventListener('click', () => document.querySelector(".dimming , .saveButton").classList.toggle('dimm'));
document.querySelector('.closeButton').addEventListener('click', () => document.querySelector(".saveResultBox , .closeButton").classList.toggle('openResultBox'));
document.querySelector('.closeButton').addEventListener('click', () => document.querySelector(".dimming , .dimm").classList.toggle('dimm'));

function prepareForm() {
  document.querySelector('#user').value = document.querySelector('#username').innerHTML
  document.querySelector('#wpm').value = typedWords;
  document.querySelector('#c_words').value = correctWords;
  document.querySelector('#f_words').value = falseWords;
}

function fetchWords() {
  let keyword1 = startWords[Math.floor(Math.random() * startWords.length)];
  let keyword2 = startWords[Math.floor(Math.random() * startWords.length)];
  let keyword3 = startWords[Math.floor(Math.random() * startWords.length)];
  start(keyword1, keyword2, keyword3)
  console.log(keyword1, keyword2, keyword3)
}