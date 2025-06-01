// document.addEventListener("DOMContentLoaded", function () {
//   const minusBtns = document.querySelectorAll(".minus-btn");
//   const plusBtns = document.querySelectorAll(".plus-btn");
//   const numDivs = document.querySelectorAll(".num");

//   minusBtns.forEach(function (minusBtn, index) {
//     minusBtn.addEventListener("click", function () {
//       let num = parseInt(numDivs[index].textContent);
//       if (num > 0) {
//         num--;
//         numDivs[index].textContent = num;
//       }
//     });
//   });

//   plusBtns.forEach(function (plusBtn, index) {
//     plusBtn.addEventListener("click", function () {
//       let num = parseInt(numDivs[index].textContent);
//       num++;
//       numDivs[index].textContent = num;
//     });
//   });
// });

// Client-side JavaScript
document.addEventListener("DOMContentLoaded", function () {
  const minusBtns = document.querySelectorAll(".minus-btn");
  const plusBtns = document.querySelectorAll(".plus-btn");
  const numDivs = document.querySelectorAll(".num");

  function updateNumber(index, updatedNumber) {
    fetch("/update-number", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ number: updatedNumber }),
    })
      .then((response) => response.text())
      .then((data) => console.log(data))
      .catch((error) => console.error("Error:", error));
  }

  minusBtns.forEach(function (minusBtn, index) {
    minusBtn.addEventListener("click", function () {
      let num = parseInt(numDivs[index].textContent);
      if (num > 0) {
        num--;
        numDivs[index].textContent = num;
        updateNumber(index, num);
      }
    });
  });

  plusBtns.forEach(function (plusBtn, index) {
    plusBtn.addEventListener("click", function () {
      let num = parseInt(numDivs[index].textContent);
      num++;
      numDivs[index].textContent = num;
      updateNumber(index, num);
    });
  });
});
