<style>
  .bg-1{
  background-image: linear-gradient(90deg,rgba(9, 12, 59, 0.581),rgba(9, 12, 59, 0.369)),url('img/carousel1.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  }

  .bg-2{
  background-image: url('img/coverr.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  }

  .bg-3{
  background-image: linear-gradient(90deg,rgba(9, 12, 59, 0.581),rgba(9, 12, 59, 0.369)),url('images/background2.jpeg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  
  }
</style>
  
  
  <div style="height:580px;">
    <div class='parent'>
      <div class='slider border'>
       <div class="w-100 flex justify-between  ml-3 mr-3 mt-5 bg-red-400" style="height:600px;">
          <button type="button" id='left' class='left' name="button">
              <svg version="1.1" id="Capa_2" x="0px" y="0px"
                viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
              <g>
              <path style='fill: #9d9d9d;' d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/>
              </g>
              </svg>
          </button>

         <button type="button" id='right' class='right' name="button">
             <svg version="1.1" id="Capa_1" width='40px' height='40px ' x="0px" y="0px"
               viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
               <g>
                 <path style='fill: #9d9d9d;' d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                   c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
                   "/>
               </g>
             </svg>
         </button>
        
       </div>
   
   
       <svg id='svg2' class='up2'>
          <circle id='circle1' class='circle1 steap' cx="40px" cy="40%" r="20"  />
          <circle id='circle2' class='circle2 steap' cx="40px" cy="40%" r="100"  />
          <circle id='circle3' class='circle3 steap' cx="40px" cy="40%" r="180"  />
          <circle id='circle4' class='circle4 steap' cx="40px" cy="40%" r="260"  />
          <circle id='circle5' class='circle5 steap' cx="40px" cy="40%" r="340"  />
          <circle id='circle6' class='circle6 steap' cx="40px" cy="40%" r="420"  />
          <circle id='circle7' class='circle7 steap' cx="40px" cy="40%" r="500"  />
          <circle id='circle8' class='circle8 steap' cx="40px" cy="40%" r="580"  />
          <circle id='circle9' class='circle9 steap' cx="40px" cy="40%" r="660"  />
        </svg>
       <svg id='svg1' class='up2'>
          <circle id='circle10' class='circle10 steap' cx="97%" cy="40%" r="20"  />
          <circle id='circle11' class='circle11 steap' cx="97%" cy="40%" r="100"  />
          <circle id='circle12' class='circle12 steap' cx="97%" cy="40%" r="180"  />
          <circle id='circle13' class='circle13 steap' cx="97%" cy="40%" r="260"  />
          <circle id='circle14' class='circle14 steap' cx="97%" cy="40%" r="340"  />
          <circle id='circle15' class='circle15 steap' cx="97%" cy="40%" r="420"  />
          <circle id='circle16' class='circle16 steap' cx="97%" cy="40%" r="500"  />
          <circle id='circle17' class='circle17 steap' cx="97%" cy="40%" r="580"  />
          <circle id='circle18' class='circle18 steap' cx="97%" cy="40%" r="660"  />
        </svg>
        
       <div id='slide1' class='bg-1 slide1 up1'>
        <p class="font-thin text-6xl">Filipino E-Taguyod</p>
        <p class="font-thin text-6xl">Filipino E-Taguyod</p>
       </div>

       <div id='slide2' class='bg-2 slide2'></div>

       <div id='slide3' class='slide3'></div>

       <div id='slide4' class='slide4'></div>
      </div>
     </div>
  </div>

  <script>
  var curpage = 1;
  var sliding = false;
  var click = true;
  var left = document.getElementById("left");
  var right = document.getElementById("right");
  var pagePrefix = "slide";
  var pageShift = 500;
  var transitionPrefix = "circle";
  var svg = true;

  function simulateRightButtonClick() {
    if (click) {
      rightSlide();
    }
  }

  setTimeout(function() {
    setInterval(simulateRightButtonClick, 5000);
  }, 3000);

  function leftSlide() {
    if (click) {
      if (curpage == 1) curpage = 5;
      console.log("work");
      sliding = true;
      curpage--;
      svg = true;
      click = false;
      for (k = 1; k <= 4; k++) {
        var a1 = document.getElementById(pagePrefix + k);
        a1.className += " tran";
      }
      setTimeout(() => {
        move();
      }, 200);
      setTimeout(() => {
        for (k = 1; k <= 4; k++) {
          var a1 = document.getElementById(pagePrefix + k);
          a1.classList.remove("tran");
        }
      }, 1400);
    }
  }

  function rightSlide() {
    if (click) {
      if (curpage == 4) curpage = 0;
      console.log("work");
      sliding = true;
      curpage++;
      svg = false;
      click = false;
      for (k = 1; k <= 4; k++) {
        var a1 = document.getElementById(pagePrefix + k);
        a1.className += " tran";
      }
      setTimeout(() => {
        move();
      }, 200);
      setTimeout(() => {
        for (k = 1; k <= 4; k++) {
          var a1 = document.getElementById(pagePrefix + k);
          a1.classList.remove("tran");
        }
      }, 1400);
    }
  }

  function move() {
    if (sliding) {
      sliding = false;
      if (svg) {
        for (j = 1; j <= 9; j++) {
          var c = document.getElementById(transitionPrefix + j);
          c.classList.remove("steap");
          c.setAttribute("class", transitionPrefix + j + " streak");
          console.log("streak");
        }
      } else {
        for (j = 10; j <= 18; j++) {
          var c = document.getElementById(transitionPrefix + j);
          c.classList.remove("steap");
          c.setAttribute("class", transitionPrefix + j + " streak");
          console.log("streak");
        }
      }
      setTimeout(() => {
        for (i = 1; i <= 4; i++) {
          if (i == curpage) {
            var a = document.getElementById(pagePrefix + i);
            a.className += " up1";
          } else {
            var b = document.getElementById(pagePrefix + i);
            b.classList.remove("up1");
          }
        }
        sliding = true;
      }, 600);
      setTimeout(() => {
        click = true;
      }, 1700);

      setTimeout(() => {
        if (svg) {
          for (j = 1; j <= 9; j++) {
            var c = document.getElementById(transitionPrefix + j);
            c.classList.remove("streak");
            c.setAttribute("class", transitionPrefix + j + " steap");
          }
        } else {
          for (j = 10; j <= 18; j++) {
            var c = document.getElementById(transitionPrefix + j);
            c.classList.remove("streak");
            c.setAttribute("class", transitionPrefix + j + " steap");
          }
          sliding = true;
        }
      }, 850);
      setTimeout(() => {
        click = true;
      }, 1700);
    }
  }

  left.onmousedown = () => {
    leftSlide();
  };

  right.onmousedown = () => {
    rightSlide();
  };

  document.onkeydown = e => {
    if (e.keyCode == 37) {
      leftSlide();
    } else if (e.keyCode == 39) {
      rightSlide();
    }
  };
</script>


 