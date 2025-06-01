const rightBtn = document.querySelector('#right-button');
const leftBtn = document.querySelector('#left-button');

rightBtn.addEventListener("click", function(event) {
  const conent = document.querySelector('#content');
  conent.scrollLeft += 300;
  event.preventDefault();
});

leftBtn.addEventListener("click", function(event) {
  const conent = document.querySelector('#content');
  conent.scrollLeft -= 300;
  event.preventDefault();
});


const rightBtn2 = document.querySelector('#right-button2');
const leftBtn2 = document.querySelector('#left-button2');

rightBtn2.addEventListener("click", function(event) {
  const conent = document.querySelector('#content2');
  conent.scrollLeft += 300;
  event.preventDefault();
});

leftBtn2.addEventListener("click", function(event) {
const conent = document.querySelector('#content2');
conent.scrollLeft -= 300;
event.preventDefault();
});



    const rightBtn3 = document.querySelector('#right-button3');
    const leftBtn3 = document.querySelector('#left-button3');

    rightBtn3.addEventListener("click", function(event) {
const conent = document.querySelector('#content3');
conent.scrollLeft += 300;
event.preventDefault();
    });

    leftBtn3.addEventListener("click", function(event) {
const conent = document.querySelector('#content3');
conent.scrollLeft -= 300;
event.preventDefault();
    });





