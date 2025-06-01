document.querySelector('.add-btn').addEventListener('click', function() {
  var inputValue1 = document.getElementById("myinput1").value;
  var inputValue2 = document.getElementById("myinput2").value;
  var inputValue3 = document.getElementById("myinput3").value;
  var inputValue5 = document.getElementById("myinput5").value;
  var inputValue4 = document.getElementById("myinput4").value;
  if (inputValue1 !== '' && (inputValue2 === '')) {
    var nextSearchDiv = document.querySelector('.search2:not([style="display: flex;"])');
    if (nextSearchDiv) {
      nextSearchDiv.style.display = 'flex';
    }
    console.log("Input1 has a value: " + inputValue1);
  } 
  else if((inputValue2 !== '') && (inputValue1 !== '') && (inputValue3 === '') ) {
    var nextSearchDiv = document.querySelector('.search3:not([style="display: flex;"])');
    if (nextSearchDiv) {
      nextSearchDiv.style.display = 'flex';
    }
    console.log("Input2 has a value: " + inputValue2);
  }
  else if((inputValue3 !== '') && (inputValue1 !== '') && (inputValue2 !== '') && (inputValue4 === '') ){
    var nextSearchDiv = document.querySelector('.search4:not([style="display: flex;"])');
    if (nextSearchDiv) {
      nextSearchDiv.style.display = 'flex';
    }
    console.log("Input3 has a value: " + inputValue3);
  }
  else if((inputValue4 !== '') && (inputValue3 !== '') && (inputValue2 !== '') && (inputValue1 !== '') && (inputValue5 === '') ){
    var nextSearchDiv = document.querySelector('.search5:not([style="display: flex;"])');
    if (nextSearchDiv) {
      nextSearchDiv.style.display = 'flex';
    }
    console.log("Input4 has a value: " + inputValue4);
  }
  else if((inputValue5 !== '') && (inputValue4 !== '') && (inputValue3 !== '') && (inputValue2 !== '') && (inputValue1 !== '')){
    document.querySelector('.add-btn').style.display = 'none';
    var nextSearchDiv = document.querySelector('.search6:not([style="display: flex;"])');
    if (nextSearchDiv) {
      nextSearchDiv.style.display = 'flex';
    }
    console.log("Input5 has a value: " + inputValue5);
  }
  
  
});